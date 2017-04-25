<?php 

class Type extends Model{
    function __construct(){
        parent::__construct();
    }
    
    public function getAll(){
        $where = "1 = 1 --";
        return $this->database->select('Type_Exam', $where);
    }
    
    public function getAllType(){
        return $this->database->select('Type_Exam');
    }
    
    public function get($id){
        $where = "`id` = {$id}";
        return $this->database->select('Type_Exam', $where);
    }
    
    public function edit($data, $id){
        $where = "`id` = {$id}";
        return $this->database->update('Type_Exam', $data, $where);
    }
    
    public function del($id){
         $where = "`id` = {$id}";
        $data = array('status' => 0);
        return $this->database->update('Type_Exam', $data, $where);
    }
      public function undel($id){
         $where = "`id` = {$id}";
        $data = array('status' => 1);
        return $this->database->update('Type_Exam', $data, $where);
    }
}