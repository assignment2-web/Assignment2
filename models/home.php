<?php 

class Home extends Model{
    function __construct(){
        parent::__construct();
    }
    
    public function getAllExamLatest(){
        $sql = "select  e.*, u.username, t.data image_type  from Exam e
                join User u on e.user_fk = u.user_id
                left join Type_Exam t on t.id = e.type_fk
                where e.status = 1 and e.approval = 1
                ORDER BY e.date DESC limit 8";
        return $this->database->query($sql);
    }
    
    public function getAllExamMostView(){
         $sql = "select  e.*, u.username, t.data image_type  from Exam e
                join User u on e.user_fk = u.user_id
                left join Type_Exam t on t.id = e.type_fk
                where e.status = 1 and e.approval = 1
                ORDER BY e.view DESC limit 12";
        return $this->database->query($sql);
    }
       
    
    public function getDetailExam($examId){
        $sql = "select  e.*, u.username, t.data image_type, t.name name_type  from Exam e
                join User u on e.user_fk = u.user_id
                left join Type_Exam t on t.id = e.type_fk
                where e.status = 1 and e.exam_id = {$examId}";
        return $this->database->query($sql);
    }
    
    public function visitedExam($id){
        $query = "update Exam set view = view + 1 where exam_id = {$id}";
        $this->database->query($query);
    }
    
    public function downloadExam($id){
        $query = "update Exam set download = download + 1 where exam_id = {$id}";
        $this->database->query($query);
        
    }
}