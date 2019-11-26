<?php

namespace ishop;

class Registry
{
    
    public function __construct(){
        $params = require_once(ROOT . '/config/params.php');
        if(!empty($params)){
           
            foreach($params as $k => $v)
            {
               self::setProperty($k,  $v);
            }
    }
    }

    public static $propertiec = [];

    public function setProperty($key,  $value){
        self::$propertiec[$key] = $value;
    }

    public function getProperty($name)
    {
        
        if(!empty(self::$propertiec[$name])){
            print_r(self::$propertiec[$name]);
        }
        else{
            echo('NULL');
        }
    }

    public function getProperties()
    {
        if(DEBUG)
        {
            print_r(self::$propertiec);
        }
        if(DEBUG == 0)
        {
            echo 'FORBIDDEN: enable development mode';
        }
        
    }

}