<?php

class Type extends Model{
    function __construct(){
        parent::__construct();
    }

    public function getAll(){
        $where = "1 = 1 --";
        return $this->database->select('Type_Exam', $where);
    }

    public function getAllType($maximum = false){
        if($maximum){
            $query = "SELECT id,name FROM Type_Exam WHERE status = 1";
            return $this->database->query($query);
        }
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

    public function newType($data ){
        return $this->database->insert('Type_Exam', $data);
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
