<?php

require 'config/route.php';
require 'config/database.php';
require 'config/constants.php';

function __autoload($class) {
	require LIBS . $class .".php";
    
}

$app = new Helper();

