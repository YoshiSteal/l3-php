<?php

class Autoload{
    static function register(){
        spl_autoload_register(function ($class){
            //var_dump($class);die;
            require_once ($class.'.php');
        });
    }
}