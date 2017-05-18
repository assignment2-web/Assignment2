<?php

class Exam extends Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function addSubject($data){
        return $this->database->insert('Exam', $data);
    }
    
    public function getLastInsertId(){
        return $this->database->getLastInsertId();
    }
    
    public function addQuestion($data){
        return $this->database->insert('Question', $data);
    }
    
    public function updateQuestion($data, $questionId){
        $where = "`question_id` = {$questionId}";
        return $this->database->update('Question', $data, $where);
    }
    public function updateAnswer($data, $questionId){
        $where = "`question_fk` = {$questionId}";
        return $this->database->update('Answer', $data, $where);
    }
      public function updateExam($data, $examId){
        $where = "`exam_id` = {$examId}";
        return $this->database->update('Exam', $data, $where);
    }
    
    public function addAnswer($data){
        return $this->database->insert('Answer', $data);
    }
    
    public function getAllQuestion($examId){
        $where = "`exam_fk` = {$examId}";
        $result = $this->database->select('Question', $where);
        $count = $result->rowCount();
        $question = array();
        if($count > 0){
            while ($row = $result->fetch()) {
                $anwser = $this->getAllAnswer($row['question_id']);
                array_push($question, array('question' => $row , 'answer' => $anwser));
            }
        }
        
//        print_r($question);
        return $question;
    }

    public function getAllQuestionShuff($examId,$shuffle = false){
        $where = "`exam_fk` = {$examId}";
        $result = $this->database->select('Question', $where);
        $count = $result->rowCount();
        $question = array();
        if($count > 0){
            while ($row = $result->fetch()) {
                $anwser = $this->getAllAnswerShuff($row['question_id'], $shuffle);
                array_push($question, array('question' => $row , 'answer' => $anwser));
            }
        }
        
//        print_r($question);
        return $question;
    }
    
    public function getExam($examId){
         $where = "`exam_id` = {$examId}";
         $result = $this->database->select('Exam', $where);
        $count = $result->rowCount();
        $row = array();
        if($count > 0){
            $row = $result->fetch();
        }
        return $row;
    }
    
    public function getAllExam($userId){
        $sql = "select  e.*, u.username, t.data image_type  from Exam e
                join User u on e.user_fk = u.user_id
                left join Type_Exam t on t.id = e.type_fk
                where e.status = 1 and u.user_id = {$userId} ORDER BY e.date DESC";
        $result = $this->database->query($sql);
        return $result->fetchAll();
    }
    
    public function searchExam($key, $filter, $arrange = 0){
        // 0 name 
        // 1 date 
        // 2 view
        $sql = "select  e.*, u.username, t.data image_type  from Exam e
                join User u on e.user_fk = u.user_id
                left join Type_Exam t on t.id = e.type_fk
                where e.status = 1 and e.approval = 1 and (e.name like '%{$key}%' or e.description like '%{$key}%')
                ";
        if($filter != -1){
            $sql .= " and e.type_fk = {$filter} ";
        }
        switch($arrange){
            case 0:
                $sql .= " order by e.name";
                break;
            case 1:
                $sql .= " order by e.date desc";
                break;
            case 1:
                $sql .= " order by e.view desc";
                break;
                    
        }
        return $this->database->query($sql);
    }
    
    public function getAllExamWithoutStatus(){
        $where = "1 = 1 ORDER BY date DESC --";
        return $this->database->select('Exam', $where);
    }
    
    public function getAllExamWithoutApproval(){
        $where = "`approval` = 0";
        return $this->database->select('Exam', $where);
    }
    
    public function setApprovalExam($examId){
        $data = array('approval' => 1);
        $where = "`exam_id` = {$examId}";
        return $this->database->update('Exam', $data, $where);
    }
    
    public function deleteExam($examId){
        $data = array('approval' => 0, 'status' => 0);
        $where = "`exam_id` = {$examId}";
        return $this->database->update('Exam', $data, $where);
    }
    
    public function undeleteExam($examId){
        $data = array('approval' => 0, 'status' => 1);
        $where = "`exam_id` = {$examId}";
        return $this->database->update('Exam', $data, $where);
    }
    
    
    public function getAllAnswer($questionId){
        $where = "`question_fk` = {$questionId}";
        $result = $this->database->select('Answer', $where);
        $count = $result->rowCount();
        $anwser = array();
        $correct = null;
        $incorrect = array();
        if($count > 0){
            while ($row = $result->fetch()) {
                if($row['correct'] == 1){
                    $correct =  $row;
                }else{
                    array_push($incorrect, $row);
                }
            }
        }
        $anwser = array('correct' => $correct, 'incorrect' => $incorrect);
        return $anwser;
    }
    
    public function getAllAnswerShuff($questionId, $shuffle = false){
        $where = "`question_fk` = {$questionId}";
        $result = $this->database->select('Answer', $where);
        $count = $result->rowCount();
        $anwser = array();
        if($count > 0){
            while ($row = $result->fetch()) {
                array_push($anwser, $row);
            }
        }
        return $anwser;
    }
    
    public function deleteQuestion($questionId){
        $data = array(
          'status' => 0  
        );
        $this->updateAnswer($data, $questionId);
        return $this->updateQuestion($data, $questionId);
    } 
    
}