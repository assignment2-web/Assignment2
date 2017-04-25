<?php

class User extends Model {
    function __construct(){
        parent::__construct();
        
    }
    
    public function auth($username, $password){
        echo "Xac thuc";
        return $this->database->select("User" ," `username` = '{$username}' AND `password` = '{$password}'");
    }
    
    public function addNew($data){
        return $this->database->insert("User", $data);
    }
    
    public function getAllUser($full = false){
        $where = "";
        if($full){
            $where = "1 = 1 --";
        }
        return $this->database->select("User", $where);
    }
    
    public function delUser($id){
        $where = "`user_id` = {$id}";
        $data = array(
          'status' => 0  
        );
        return $this->database->update("User", $data, $where);
    }
    public function undelUser($id){
        $where = "`user_id` = {$id}";
        $data = array(
          'status' => 1 
        );
        return $this->database->update("User", $data, $where);
    }
    
    public function getUser($id){
        $where = "`user_id` = {$id}";
        return $this->database->select("User", $where);
    }
    
    public function updateUser($data, $id){
        $where = "`user_id` = {$id}";
        return $this->database->update("User", $data, $where);
    }
    
}