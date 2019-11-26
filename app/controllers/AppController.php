<?php
require_once 'hub.php';
require_once ROOT . CORE . '/base/Controller.php';
class AppController extends hub
{
    
    public function __construct($arr)
    {
        $cnt = new ishop\base\Controller($arr,'title','desc','key');  
        $cnt->setData(['name'=> 'misha', 'age' => 14]);  
        $cnt->getView();
        
      
    }
    
}
