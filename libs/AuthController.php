<?php

class AuthController extends Controller{
    function __construct(){
        parent::__construct();
        
    }
    
    
    public function auth(){
        $logged = Session::get('loggedIn');
		if ($logged == false) {
            $this->loadNotify();
            $this->notify->notify(ERROR_CODE, "Vui lòng đăng nhập  !");
            return false;
		}
        return true;
    }
}