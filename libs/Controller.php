<?php

class Controller {

	function __construct() {
		
		$this->view = new View();
		$this->view->response = array();
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
		array_push($this->view->response, array('code' => $respone_code, 'message' => $message));
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