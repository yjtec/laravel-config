<?php
namespace Yjtec\Config;

class YjConfig
{
    private $data;
    public function __construct($data)
    {
        if (!$data) {
            $list = \Yjtec\Config\Models\Config::get();
            $data = $list->mapWithKeys(function ($item) {
                return [$item['key'] => $item['value']];
            });
            \MC::set('yj_config_gloabl', $data->toArray());
        }
        $this->data = $data;
    }
    public function get($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return '';
    }
}
