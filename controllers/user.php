<?php

class UserController  extends AuthController{
    function __construct(){
        parent::__construct();
        $this->loadNotify();
        $this->loadModel('user');
    }
    
    public function add(){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $userpwd = $_POST['userpwd'];
        $userwork = $_POST['userwork'];
        $note = $_POST['note'];
        $image = "";
        
        
        $data = ['fullname' => $fullname, 'username' => $username, 
                 'password' => $userpwd, 'description' => $note,
                 'email' => $useremail, 'major_fk' => intval($userwork), 'img' => $image
                ];
        if($this->model->addNew($data))
        {
             $this->notify->notify(SUCCESS_CODE, "Đăng kí thành công !");
        }else{
             $this->notify->notify(ERROR_CODE, "Đăng kí thất bại !");
        }
    }
    
    public function index(){
        $result = $this->model->getUser(Session::get('user_id'));
        $this->view->data = $result->fetch();
        $this->view->render('user/info');
    }
    
    
    
    
}