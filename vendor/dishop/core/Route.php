<?php

namespace ishop;

class Route
{

    protected $routes = [];

    protected $route = [];

    public function __construct()
    {
        $uri =  $_SERVER['REQUEST_URI'];
        $uri = $this->getGtpr($uri);
        
        $uri = trim($uri, "/");
        $uri = explode("/", $uri);
        
        
        if (empty($uri[0])) {
            die;
        }
        $this->routeProcessing($uri);
    }

    public function addRoute($k, $v)
    { }

    public function routeProcessing($arr)
    {
        $num3 = 3;
        $num = count($arr);

        if (count($arr) > $num3) {
            require_once ROOT . WWW . '/errors/404.php';
            die;
        }
        $arr = $this->arrProcessing($arr, $num);
        
        if (count($arr) == $num3) {
            if ($arr['prefix'] == 'FdE87') {
                $acces = 0;

                $str11 = $arr['controller'] . "Controller";
                $str13 = $arr['action'];
                $str12 = ROOT . '/app/controllers/FdE87/' . $str11 . '.php';
                if (file_exists($str12)) {
                    require_once $str12;
                    $controlerObj = new $str11($arr);
                    $controlerObj->$str13();

                    die;
                } else {
                    require_once ROOT . WWW . '/errors/404.php';
                    die;
                }
            } else {
                $acces = 1;

                $str11 = $arr['controller'] . "Controller";
                $str13 = $arr['action'];
                $str12 = ROOT . '/app/controllers/' . $str11 . '.php';
                if (file_exists($str12)) {
                    require_once $str12;
                    $controlerObj = new $str11($arr);
                    $controlerObj->$str13();
                    die;
                } else {
                    require_once ROOT . WWW . '/errors/404.php';
                    die;
                }
            }
        }
        if (count($arr) == 2) {

            $str11 = $arr['controller'] . "Controller";
            $str13 = $arr['action'];
            $str12 = ROOT . '/app/controllers/' . $str11 . '.php';
            if (file_exists($str12)) {
                require_once $str12;
                $controlerObj = new $str11($arr);
                $controlerObj->$str13();
                die;
            } else {
                require_once ROOT . WWW . '/errors/404.php';
                die;
            }
        }
        if (count($arr) == 1) {
            $str11 = $arr['controller'] . "Controller";
            $str12 = ROOT . '/app/controllers/' . $str11 . '.php';

            if (file_exists($str12)) {

                require_once $str12;
                $controlerObj = new $str11($arr);
            } else {
                throw new Exception("Контроллер{$str12} - не найден", 404);
                die;
            }
        }
    }
    public function arrProcessing($arr, $num)
    {


        if ($num == 3) {
            $p = $arr['0'];
            $c = $this->controllerProcessing($arr[1]);
            $a = $this->actionProcessing($arr[2]);
            $arr['controller'] = $c;
            unset($arr[0]);
            unset($arr[1]);
            unset($arr[2]);
            $arr['action'] = $a;
            $arr['prefix'] = $p;
        }
        if ($num == 2) {
            $c = $this->controllerProcessing($arr[0]);
            $a = $this->actionProcessing($arr[1]);
            unset($arr[0]);
            unset($arr[1]);
            $arr['controller'] = $c;
            $arr['action'] = $a;
            $arr['prefix'] = '';
        }
        if ($num == 1) {
            $c = $this->controllerProcessing($arr[0]);
            unset($arr[0]);
            $arr['controller'] = $c;
            $arr['action'] = '';
            $arr['prefix'] = '';
        }
        return $arr;
    }
    public function controllerProcessing($str)
    {
        return str_replace(" ", "", ucwords(str_replace("-", " ", $str)));
    }

    public function actionProcessing($str)
    {
        return lcfirst($this->controllerProcessing($str));
    }
    public function getGtpr($uri){
        
        $result = explode("?",$uri, 2);
        
        
        
        if(strpos($result[0], "=") !== 3){
            return(rtrim($result[0]));
        }else {return '';}
        
        
    }
}
