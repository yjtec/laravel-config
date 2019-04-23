<?php
namespace Yjtec\Config\Facades;
use Illuminate\Support\Facades\Facade;
class YjConfig extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'yjconfig';
    }
}