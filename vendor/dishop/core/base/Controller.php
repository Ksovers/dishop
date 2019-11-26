<?php

namespace ishop\base;

class Controller
{
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = ['title' => '', 'desc' => '', 'key' => ''];

    public function __construct($route, $title , $desc , $key )
    {
        $this->route = $route;

        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];

        $this->prefix = $route['prefix'];
        $this->setMeta($title , $desc , $key );
    }


    public function setData($data)
    {
        $this->data = $data;
    }


    public function setMeta($title = '', $desc = '', $key = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['key'] = $key;
        
    }

    public function getView(){
      
        $viewObj = new View($this->route,
        $this->layout, $this->view, $this->meta,$this->data, $this->route['controller'], $this->route['prefix']);
        
        $viewObj->rendor($this->data);
    }
    
}
