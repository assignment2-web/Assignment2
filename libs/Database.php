<?php

class Database extends PDO
{

	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	}

    public function select($table, $where=""){
        $conn = "";
        $select = "";
        if(!empty($where)){
            $conn = " $where AND ";
        }
        $sth = $this->prepare("SELECT * FROM $table WHERE $conn `status` = 1");
        $sth->execute();
        return $sth;
    }

    public function query($sql){
        $sth = $this->prepare($sql);
        $sth->execute();
        return $sth;
    }

    public function getLastInsertId(){
        return $this->lastInsertId();
    }


	public function insert($table, $data)
	{
		ksort($data);

		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
        try{
            $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }
            return $sth->execute();
        }catch(PDOException $e){
            echo $e;
            return false;
        }
	}

	public function update($table, $data, $where)
	{
		ksort($data);

		$fieldDetails = NULL;
		foreach($data as $key=> $value) {
			$fieldDetails .= "`$key`=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		try {
            $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
            }

            return $sth->execute();
        }catch (PDOException $e){
            echo $e;
            return false;
        }
	}

}
