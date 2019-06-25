<?php

namespace App\Ds;

use Illuminate\Database\Eloquent\Model;

class Danli extends Model
{
    //创建静态私有的变量保存该类对象
    static private $instance;
    //参数
    private $config;
    //防止直接创建对象
    private function __construct($config)
    {
        $this->config = $config;
        echo "我被实例化了";
    }
    //防止克隆
    private function __clone(){

    }
    static public function getInstance($config){
        if(!self::$instance instanceof self){
            self::$instance = new self($config);
        }
        return self::$instance;

    }
    public function getName(){
        dd($this->config);

    }
}

