<?php

class GuestController extends Controller {
    
    function __construct(){
        parent::__construct();
        $this->loadModel('exam');
    }
    
    function visit($id){
        $question = $this->model->getAllQuestion($id);
        $this->loadModel('home');
        $exam = $this->model->getDetailExam($id);
        $exam = $exam->fetch();
        $this->view->data = array('exam' => $exam, 'data' => $question);
        $this->model->visitedExam($id);
        $this->view->render('home/detail');
    }   
    
    function index(){
         $this->loadModel('type');
         $result = $this->model->getAllType();
        $type = $result->fetchAll();
        $this->view->data = array('option' => $type, 'data' => array(), 'key' => '', 'filter' => -1);
         $this->view->render('home/search');
    }
    
    function search_form(){
        $key = $_POST['keyword'];
        $filter = $_POST['filter'];
         $result = $this->model->searchExam($key, $filter);
        $data = $result->fetchAll();
         $this->loadModel('type');
        $result = $this->model->getAllType();
        $type = $result->fetchAll();
          $this->view->data = array('option' => $type, 'data' => $data, 'key' => $key, 'filter' => $filter);
        $this->view->render('home/search');
    }
    
}
    