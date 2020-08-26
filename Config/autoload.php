<?php

class Autoloader
{
    static function register()
    {
        spl_autoload_register(array(__CLASS__,"autoload"));
    }
    static function autoload($class)
    {
        //echo $class;
        if(file_exists("../src/Model/".$class.".php"))
        {
            require_once "../src/Model/".$class.".php";
        }
        else if(file_exists("../src/Controller/".$class.".php"))
        {
            require_once "../src/Controller/".$class.".php";
        }
        
    }
}
Autoloader::register();

?>