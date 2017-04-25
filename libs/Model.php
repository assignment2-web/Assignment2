<?php

class Model {

	function __construct() {
	   $this->database = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}
    
    

}