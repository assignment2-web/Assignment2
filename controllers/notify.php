<?php

class NotifyController extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    public function notify($type_code, $message){
        $this->view->type = $type_code;
        $this->view->message = $message;
        $this->view->render('notify/notify');
    }
    
    public function notify_admin($type_code, $message){
        $this->view->type = $type_code;
        $this->view->message = $message;
        $this->view->render('admin/notify');
    }
}