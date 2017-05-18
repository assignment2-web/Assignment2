<?php


class AdminController extends AuthController{
    function __construct(){
        parent::__construct();
        $this->loadModel('user');
        $this->loadNotify();
    }

    function index(){
        $this->loadModel('exam');
        $result= $this->model->getAllExamWithoutApproval();
        $row = $result->rowCount();
        $this->view->data = array('size' => $row);
        $this->view->render('admin/index');
    }

    /*------------------------Quan ly User --------------------*/

    function manager_user(){
        $result = $this->model->getAllUser(true);
        $count = $result->columnCount();
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $this->view->data = array('namecol' => $namecol, 'data' => $row);
        $this->view->render('admin/user');
    }

    function del_user($user_id){
        $result = $this->model->delUser($user_id);
        if($result)
            $this->manager_user();
    }
     function restore_user($user_id){
        $result = $this->model->undelUser($user_id);
        if($result)
            $this->manager_user();
    }

    function edit_user($user_id){
        $result  = $this->model->getUser($user_id);
        $this->view->data = $result->fetch();
        $this->view->render('admin/edit_user');
    }

    function role_user($user_id){
        $result  = $this->model->getUser($user_id);
        $this->view->data = $result->fetch();
        $this->view->render('admin/change_role_user');
    }

    function edit(){
        $user_id = $_POST['user_id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $userwork = $_POST['userwork'];
        $note = $_POST['note'];
        $data = ['fullname' => $fullname, 'username' => $username, 'description' => $note,
                 'email' => $useremail, 'major_fk' => intval($userwork)
                ];
        if($this->model->updateUser($data, $user_id))
        {
             $this->notify->notify_admin(SUCCESS_CODE, "Cập nhật thành công !");
        }else{
             $this->notify->notify_admin(ERROR_CODE, "Cập nhật thất bại !");
        }
    }

    function role(){
        $user_id = $_POST['user_id'];
        $role = $_POST['role'];
        $data = array('role' => $role);
        if($this->model->updateUser($data, $user_id))
        {
             $this->notify->notify_admin(SUCCESS_CODE, "Cập nhật quyền thành công !");
        }else{
             $this->notify->notify_admin(ERROR_CODE, "Cập nhật quyền thất bại !");
        }
    }

    /*--------------------------Quan ly bai dang--------------------*/

    function category_exam(){
        $this->loadModel('type');
        $result = $this->model->getAll();
        $count = $result->columnCount();
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $this->view->data = array('namecol' => $namecol, 'data' => $row);
        $this->view->render('admin/category_exam');
    }

    function new_type(){
       $this->view->render('admin/new_type');
    }

    function newed_type(){
      $this->loadModel('type');
      $name = $_POST['name'];
      $image = "";
      $name_image = "";
     if(getimagesize($_FILES['image']['tmp_name']) !== false){
         $image = addslashes($_FILES['image']['tmp_name']);
         $name_image = addslashes($_FILES['image']['name']);
         $image = file_get_contents($image);
         $image = base64_encode($image);
     }else{
         echo "Chon  anh";
     }

     $data = array(
         'name' => $name,
         'img' => $name_image,
         'data' => $image
     );
      if($this->model->newType($data))
      {
          $result = $this->model->getAll();
         $count = $result->columnCount();
         $namecol = array();
         for($i = 0; $i < $count; $i++){
             $meta = $result->getColumnMeta($i);
             array_push($namecol,$meta['name']);

         }
         $row = $result->fetchAll();
         $this->view->data = array('namecol' => $namecol, 'data' => $row);
         $this->view->render('admin/category_exam');
      }
    }

    function edit_type($id){
        $this->loadModel('type');
        $result = $this->model->get($id);
        $this->view->data = $result->fetch();
        $this->view->render('admin/edit_type');
    }

     function edited_type(){
         $this->loadModel('type');
         $id = $_POST['id'];
         $name = $_POST['name'];
         $image = "";
         $name_image = "";
        if(getimagesize($_FILES['image']['tmp_name']) !== false){
            $image = addslashes($_FILES['image']['tmp_name']);
            $name_image = addslashes($_FILES['image']['name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);
        }else{
            echo "Chon  anh";
        }

        $data = array(
            'name' => $name,
            'img' => $name_image,
            'data' => $image
        );
         if($this->model->edit($data, $id))
         {
             $result = $this->model->getAll();
            $count = $result->columnCount();
            $namecol = array();
            for($i = 0; $i < $count; $i++){
                $meta = $result->getColumnMeta($i);
                array_push($namecol,$meta['name']);

            }
            $row = $result->fetchAll();
            $this->view->data = array('namecol' => $namecol, 'data' => $row);
            $this->view->render('admin/category_exam');
         }
     }

    function del_type($id){
        $this->loadModel('type');
        $result = $this->model->del($id);
        $result = $this->model->getAll();
        $count = $result->columnCount();
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $this->view->data = array('namecol' => $namecol, 'data' => $row);
        $this->view->render('admin/category_exam');
    }
     function undel_type($id){
        $this->loadModel('type');
        $result = $this->model->undel($id);
        $result = $this->model->getAll();
        $count = $result->columnCount();
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $this->view->data = array('namecol' => $namecol, 'data' => $row);
        $this->view->render('admin/category_exam');
    }

    function manage_exam(){
        $this->loadModel('exam');
        $result = $this->model->getAllExamWithoutStatus();
        $count = $result->columnCount();
        $row = $result->rowCount();
        $index = 0;
        // So trang dc phan ra
        $number_page = intval($row / PAGER);
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $row = array_slice($row, 0, PAGER, true);
        $this->view->data = array('namecol' => $namecol, 'data' => $row, 'num_page' => $number_page, 'index' => $index);
        $this->view->render('admin/manage_exam');

    }

    function pager($index){
        $this->loadModel('exam');
        $result = $this->model->getAllExamWithoutStatus();
        $count = $result->columnCount();
        $row = $result->rowCount();
        // So trang dc phan ra
        $number_page = intval($row / PAGER);
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $row = array_slice($row, $index*PAGER,PAGER, true);
        $this->view->data = array('namecol' => $namecol, 'data' => $row, 'num_page' => $number_page, 'index' => $index);
        $this->view->render('admin/manage_exam');
    }

    function edit_exam($examId){
        $this->loadModel('exam');
        $this->model->setApprovalExam($examId);
        $result = $this->model->getAllExamWithoutStatus();
        $count = $result->columnCount();
        $row = $result->rowCount();
        $index = 0;
        // So trang dc phan ra
        $number_page = intval($row / PAGER);
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $row = array_slice($row, 0, PAGER, true);
        $this->view->data = array('namecol' => $namecol, 'data' => $row, 'num_page' => $number_page, 'index' => $index);
        $this->view->render('admin/manage_exam');
    }
    function restore_exam($examId){
         $this->loadModel('exam');
        $this->model->undeleteExam($examId);
        $result = $this->model->getAllExamWithoutStatus();
        $count = $result->columnCount();
        $row = $result->rowCount();
        $index = 0;
        // So trang dc phan ra
        $number_page = intval($row / PAGER);
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $row = array_slice($row, 0, PAGER, true);
        $this->view->data = array('namecol' => $namecol, 'data' => $row, 'num_page' => $number_page, 'index' => $index);
        $this->view->render('admin/manage_exam');
    }
     function del_exam($examId){
        $this->loadModel('exam');
        $this->model->deleteExam($examId);
        $result = $this->model->getAllExamWithoutStatus();
        $count = $result->columnCount();
        $row = $result->rowCount();
        $index = 0;
        // So trang dc phan ra
        $number_page = intval($row / PAGER);
        $namecol = array();
        for($i = 0; $i < $count; $i++){
            $meta = $result->getColumnMeta($i);
            array_push($namecol,$meta['name']);

        }
        $row = $result->fetchAll();
        $row = array_slice($row, 0, PAGER, true);
        $this->view->data = array('namecol' => $namecol, 'data' => $row, 'num_page' => $number_page, 'index' => $index);
        $this->view->render('admin/manage_exam');
    }

    function logout(){
        Session::destroy();
        $this->view->redirect('home');
    }

}
