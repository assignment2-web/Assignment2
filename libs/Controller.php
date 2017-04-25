<?php

class Controller {

	function __construct() {
		
		$this->view = new View();
		$this->view->type = UNDEFINE;
		$this->view->message = "";
        Session::init();
        
	}
    
    public function loadModel($name) {
		
		$path = 'models/'.$name.'.php';
		
		if (file_exists($path)) {
			require $path;
			$modelName = $name;
			$this->model = new $modelName();
		}		
	}
    
    public function auth(){
        return true;
    }

	public function response($respone_code, $message){
		$this->view->type = $respone_code;
		$this->view->message = $message;
	}
    
    public function loadNotify(){
        $path = 'controllers/notify.php';
		if (file_exists($path)) {
			require $path;
			$controllerName = "NotifyController";
			$this->notify = new $controllerName();
		}   
    }

}