<?php

namespace ishop;

class App
{

    public static $app;

    public function __construct(){
        $query = trim($_SERVER['QUERY_STRING'], "/");
        session_start();
        new ErrorHandler();
    }
    
   
}
