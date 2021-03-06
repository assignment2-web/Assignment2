<?php

class ManageController extends AuthController{

    function __construct(){
        parent::__construct();
        $this->loadModel('exam');
        $this->loadNotify();
    }


    function index(){
        $this->view->listExams = $this->model->getAllExam(Session::get('user_id'));
        $this->view->render('exam/manage_exam');
    }

    function modify($exam_id){
        $questions = $this->model->getAllQuestion($exam_id);
        if(count($questions) == 0){
            $this->view->data = $exam_id;
            $this->view->counter = 1;
            $this->view->render('exam/exam_detail');
        }else{
            $this->view->data = $questions;
            $this->view->current_index = 0;
            $this->view->exam_id = $exam_id;
            print_r($questions[0]['answer']['correct']);
            $this->view->render('exam/modify_exam');
        }
    }

    function modify_item(){
        $data = $_POST['test'];
        $s  = json_decode($data);
        print_r($s);
    }

    function delete($examId){
        $this->model->deleteExam($examId);
        $this->view->listExams = $this->model->getAllExam(Session::get('user_id'));
        $this->view->render('exam/manage_exam');
    }

    function pager($exam_id, $current_index){
        $questions = $this->model->getAllQuestion($exam_id);
        $this->view->data = $questions;
        $this->view->current_index = $current_index;
        $this->view->exam_id = $exam_id;
        $this->view->render('exam/modify_exam');

    }

    function add_question($exam_id){
        $this->view->data = $exam_id;
        $this->view->counter = 1;
        $this->view->render('exam/exam_detail');
    }

    function delete_question($exam_id,$question_id){
        $this->model->deleteQuestion($question_id);
        $questions = $this->model->getAllQuestion($exam_id);
        if(count($questions) == 0){
            $this->view->data = $exam_id;
            $this->view->counter = 1;
            $this->view->render('exam/exam_detail');
        }else{
            $this->view->data = $questions;
            $this->view->current_index = 0;
            $this->view->size_index = count($questions);
            $this->view->exam_id = $exam_id;
            $this->view->render('exam/modify_exam');
        }
    }

    function update_question(){
        $name = $_POST["action"];

        $exam_fk = $_POST['exam_fk'];
        $question_id = $_POST['question_id'];
        $index = $_POST['index'];
        if(strtolower($name) == "update"){
              echo "UPDATE";
            $name = $_POST['name'];
            echo $name;
            $point = $_POST['point'];
            $correct = $_POST['correctquestion'];
            $incorrect = $_POST['incorrectquestion'];
            $exam_fk = $_POST['exam_fk'];
            $note = $_POST['note'];
            $question_id = $_POST['question_id'];
            $index = $_POST['index'];
            $data = array(
                        'content' => $name,
                        'point' => intval($point), 'description' => $note
                        );
            // $where = "`question_id` = {$question_id}";
            if($this->model->updateQuestion($data, $question_id)){
                $data = array(
                'status' => 0
                );
                $this->model->updateAnswer($data, $question_id);
                $current_id = $question_id;

                $answer = array(
                        'content' => $correct,
                        'question_fk' => $current_id,
                        'correct' => 1
                    );
                $add = true;
                  if(!$this->model->addAnswer($answer))
                  {
                      $add = false;
                  }else{
                      foreach($incorrect as $val){
                          $answer = array(
                              'content' => $val,
                              'question_fk' => $current_id
                          );
                          if(!$this->model->addAnswer($answer))
                          {
                                  $add = false;
                                  break;
                          }
                      }
                  }
                  if($add){
                      $this->response(SUCCESS_CODE, "Cập nhât câu trả lời thành công !");
                      $this->response(SUCCESS_CODE, "Cập nhât câu hỏi thành công !");

                  }else{
                      $this->response(ERROR_CODE, "Cập nhât câu trả lời thất bại !");
                  }

              }else{
                  $this->response(ERROR_CODE, "Cập nhât câu hỏi thất bại !");
              }

            } else {
              echo "DELETE";
                 if($this->model->deleteQuestion($question_id)){
                     $this->response(SUCCESS_CODE, "Xóa câu trả lời thành công !");
                 }else{
                     $this->response(ERROR_CODE, "Xóa câu hỏi thất bại !");
                 }
            }

        $questions = $this->model->getAllQuestion($exam_fk);
        if(count($questions) == 0){
            $this->view->data = $exam_id;
            $this->view->counter = 1;
            $this->view->render('exam/exam_detail');
        }else {
            if($index > count($questions))
              $index = $index - 1;
            $this->view->data = $questions;
            echo $index;
            $this->view->current_index = $index;
            $this->view->exam_id = $exam_fk;
            $this->view->render('exam/modify_exam');
        }
    }

}
