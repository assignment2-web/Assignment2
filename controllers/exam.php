<?php

class ExamController extends AuthController {
    
    function __construct(){
        parent::__construct();
        $this->loadModel('exam');
    }
    
    function index(){
        $this->loadModel('type');
        $result = $this->model->getAllType();
        $this->view->data = $result->fetchAll();
        $this->view->render('exam/create_exam');
    }
    
    
    function add_subject(){
        // 0 chua hoat dong
        // 1 da tao 
        // 2 da duyet 
        $name = $_POST['name'];
        $typetest = $_POST['typetest'];
        $time = $_POST['time'];
        $note = $_POST['note'];
        $data = [
              'name' => $name, 'time' => intval($time), 
              'description' => $note,
              'user_fk' => intval(Session::get('user_id')) ,
              'type_fk' => intval($typetest) ,
              'view'=> 0
            ];
        if($this->model->addSubject($data))
        {
            $this->view->data = $this->model->getLastInsertId();
            $this->view->counter = 1;
            $this->view->render('exam/exam_detail');
        }else{
//            $this->notify->notify(ERROR_CODE, "Tạo đề thi thất bại !");
        }
    }
    
    function add_question(){
        $name = $_POST['name'];
        $point = $_POST['point'];
        $correct = $_POST['correctquestion'];
        $incorrect = $_POST['incorrectquestion'];
        $exam_fk = $_POST['exam_fk'];
        $counter = $_POST['counter'];
        $note = $_POST['note'];
        
        $data = array(
                    'name' => $counter, 'content' => $name,
                    'point' => intval($point), 'description' => $note, 
                    'exam_fk' => $exam_fk
                    );
        print_r($incorrect);
        $this->loadNotify();
        if($this->model->addQuestion($data)){
             $current_id = $this->model->getLastInsertId();
            
             $answer = array(
                    'content' => $correct, 
                    'question_fk' => $current_id,
                    'correct' => 1
                );
            if(!$this->model->addAnswer($answer))
            {
                 $this->notify->notify(ERROR_CODE, "Thêm câu trả lời thất bại !");
                 return false;
            }
             foreach($incorrect as $val){
                $answer = array(
                    'content' => $val, 
                    'question_fk' => $current_id
                );
                   if(!$this->model->addAnswer($answer))
                    {
                         $this->notify->notify(ERROR_CODE, "Thêm câu trả lời thất bại !");
                         return false;
                    }
            }
            $this->view->data = $exam_fk;
            $this->view->counter = intval($counter) + 1;
            $this->view->render('exam/exam_detail');
        }else{
            $this->notify->notify(ERROR_CODE, "Thêm câu hỏi thất bại !");
        }
        
        
    }
    
    function complete_exam($data){
        $question = $this->model->getAllQuestion($data);
        $this->loadModel('home');
        $exam = $this->model->getDetailExam($data);
        $exam = $exam->fetch();
        $this->view->data = array('exam' => $exam, 'data' => $question);
//        print_r($exam);
        $this->view->render('exam/complete_exam');
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
    
    function download($id){
        $question = $this->model->getAllQuestion($id);
        $this->loadModel('home');
        $exam = $this->model->getDetailExam($id);
        $exam = $exam->fetch();
        $this->view->data = array('exam' => $exam, 'data' => $question);
        $this->model->downloadExam($id);
        $this->view->render('exam/exam_pdf');
    }
  
    
    
    
    
}