<?php

class Error extends Controller {

	function __construct() {
        parent::__construct();
		$this->index();
	}
    
    function index(){
        $this->loadNotify();
        $this->notify->notify(WARNING_CODE, "Không tồn tại trang web này !");
    }

}