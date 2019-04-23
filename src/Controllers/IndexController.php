<?php

namespace Yjtec\Config\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class IndexController extends Controller
{
    /**
     * @OA\Get(
     *     path="/config",
     *     tags={"Config"},
     *     summary="获取网站配置",
     *     operationId="ConfigIndex",
     *     @OA\Response(
     *         response=200,
     *         description="pet response",
     *         @OA\JsonContent(ref="#/components/schemas/Config")
     *     ),
     * )
     */    
    public function index(Request $request)
    {

        dd(\YjConfig::get('title'));
        $data = \MC::get('yj_config_gloabl');
        if($data){
            return $data;
        }
        $list = \Yjtec\Config\Models\Config::get();
        $data = $list->mapWithKeys(function($item){
            return [$item['key'] => $item['value']]; 
        });
        \MC::set('yj_config_gloabl',$data->toArray());
        return $data;

    }
    /**
     * @OA\Post(
     *     path="/config",
     *     tags={"Config"},
     *     summary="网站配置",
     *     operationId="ConfigStore",
     *     @OA\Response(
     *         response=200,
     *         description="pet response",
     *         @OA\JsonContent(ref="#/components/schemas/Error")
     *     ),
     *     @OA\RequestBody(
     *       required=true,
     *       @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(ref="#/components/schemas/Config"
     *           )
     *
     *       )
     *   ),
     *     security={
     *         {"token": {}}
     *     }
     * )
     */
    public function store(Request $request)
    {
        foreach($request->all() as $k=>$v){
            \Yjtec\Config\Models\Config::updateOrCreate( 
                ['key' => $k],['value' => $v]
            );
        }
        \MC::remove('yj_config_gloabl');
        return tne('SUCCESS');
    }
}
