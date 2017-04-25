<?php
    class Helper{
        function __construct(){
            if(!isset($_GET['url'])){
                require 'controllers/home.php';
                $controller = new HomeController();
                return true;
            }
            
            
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);
//            print_r($url);
            $file = 'controllers/' .strtolower($url[0]).'.php';
            if (file_exists($file)) {
                require $file;
            } else {
                require 'controllers/error.php';
                $controller = new Error();
                return false;
            }
            
            
            
            $nameController = $url[0] . "Controller";
            $controller = new $nameController;
            
            if(!$controller->auth()){
                return false;
            }    
            
            if(isset($url[3])){
                 $controller->{$url[1]}($url[2], $url[3]);
            } else {
                if (isset($url[2])) {
                    $controller->{$url[1]}($url[2]);
                } else {
                    if (isset($url[1])) {
                        $controller->{$url[1]}();
                    }
                }
            }
        }
    }


?>
