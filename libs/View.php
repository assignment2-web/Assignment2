<?php

class View {

	function __construct() {
	}

	public function render($name)
	{
        require 'views/' . $name . '.php';
       
	}
    
    public function redirect($url)
    {
        header('Location: ' . URL . $url);
        
    }
    
    


}

?>