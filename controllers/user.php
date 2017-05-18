<?php

class UserController  extends Controller{
    function __construct(){
        parent::__construct();
        $this->loadModel('user');
    }

    public function add(){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $userpwd = $_POST['userpwd'];
        $userwork = "0";
        $note = "";
        $image = "";

        if($this->check_user($username, $useremail)){


            $data = ['fullname' => $fullname, 'username' => $username,
                    'password' => $userpwd, 'description' => $note,
                    'email' => $useremail, 'major_fk' => intval($userwork), 'img' => $image
                    ];
            if($this->model->addNew($data))
            {
                $this->response(SUCCESS_CODE, "Đăng kí thành công");

            }else{
                $this->response(ERROR_CODE, "Đăng kí thất bại");
            }

        }else{
            $this->response(ERROR_CODE, "Đã tồn tại người dùng này ");
        }
        $this->view->render('user/signin');
    }


    public function check_user($username, $email) {


        $result = $this->model->checkUser($username);
        $row = $result->fetch();
        $count = $result->rowCount();

        if($count > 0){
            return false;
        }

        return true;

    }

    public function index(){
        $result = $this->model->getUser(Session::get('user_id'));
        $this->view->data = $result->fetch();
        $this->view->render('user/info');
    }

    public function edit(){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $data = array(
            'fullname' => $fullname, 'username' => $username,
            'email' => $email
        );

        if($this->model->updateUser($data, $id)){
            $this->response(SUCCESS_CODE, "Chỉnh sửa thông tin thành công");
        }else{
            $this->response(ERROR_CODE, "Chỉnh sửa thông tin thất bại");
        }
        $result = $this->model->getUser(Session::get('user_id'));
        $this->view->data = $result->fetch();
        $this->view->render('user/info');
    }

    public function change_pass(){
        $oldpass = $_POST['olduserpwd'];
        $newpass = $_POST['newuserpwd'];
        $data = array(
              'password' => $newpass
        );
        $id = $_POST['id'];

        if($this->model->updateUser($data, $id)){
            $this->response(SUCCESS_CODE, "Chỉnh sửa thông tin thành công");
        }else{
            $this->response(ERROR_CODE, "Chỉnh sửa thông tin thất bại");
        }
        $result = $this->model->getUser(Session::get('user_id'));
        $this->view->data = $result->fetch();
        $this->view->render('user/info');
    }




}
