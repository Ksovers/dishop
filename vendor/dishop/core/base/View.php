<?php

namespace ishop\base;

class View
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];
    public function __construct($route,  $layout,$view, $meta, $data,
    $controller = 'Main', $prefix = '')
    {
        $this->route = $route;
        $this->controller = $controller;
        $this->model = $controller;

        $this->view = $view;
        $this->prefix = $prefix;
        $this->meta = $meta;
        $this->data = $data;
        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
            
        }
    }
    public function rendor($data)
    {
        $viewFile = ROOT . APP  . "views/" . "{$this->prefix}" . "{$this->controller}/{$this->view}.php";
        if (file_exists($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
            
        } else {
            throw new \Exception("Не найден вид {$this->view}", 404);
        }
       
        if(false !== $this->layout){
           
           require_once(  ROOT . APP  . "views/layouts/" . "{$this->prefix}" . "{$this->layout}.php" );
           
       }else{
        throw new \Exception("Не найден шаблон {$this->layout}", 404);
       }
    }
    
}
