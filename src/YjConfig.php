<?php 
namespace Yjtec\Config;
class YjConfig{
    private $data;
    public function __construct($data){
        $this->data = $data;
    }
    public function get($key){
        if(isset($this->data[$key])){
            return $this->data[$key];
        }
        return '';
    }
}