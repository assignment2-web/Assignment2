<?php

class LoginController extends Controller {

	function __construct() {
		parent::__construct();
        $this->loadModel('user');
         $this->loadNotify();
	}

	function index() 
	{	
        $this->view->type = UNDEFINE;
        $this->view->message = "";
		$this->view->render('user/login');
	}
	
	function run()
	{
		$this->model->run();
	}
    
    function login_user(){
        $user_name = $_POST['username'];
        $user_pwd = $_POST['userpwd'];
        $result = $this->model->auth($user_name, $user_pwd);     
        $row = $result->fetch();
        $count = $result->rowCount();
        
        if($count > 0){
            Session::set('loggedIn', true);
            Session::set('role', $row['role']);
            Session::set('user_id', $row['user_id']);
            Session::set('user_name', $row['username']);
            echo "thanh cong";
            $this->view->redirect('home');
        }else{
//            $this->notify->notify(ERROR_CODE, "Đăng nhập thất bại !");
            $this->response(ERROR_CODE, "Tài khoản không tồn tại hoặc sai mật khẩu! Vui lòng kiểm tra lại !");
            $this->view->render('user/login');
        }
        
        
    }
    function forget_pass(){
        $this->view->render('user/forget_pass');

    }
    
    function signin(){
        $this->view->render('user/signin');
    }
    
    function logout(){
        Session::destroy();
        $this->view->redirect('home');
    }

}
