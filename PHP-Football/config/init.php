<?php
//Start session
session_start();

// config file
require 'config.php';

// include helper
require $_SERVER['DOCUMENT_ROOT'].'/helpers/system_helper.php';
// Autoloader : it will inculde the file of class when ever is used
/* function __autoload($class_name){
    require_once 'lib/'.$class_name.'.php';    
} */

// Starting PHP 5.3.0 we can use unknown function
spl_autoload_register(function ($class_name) {
    $class_name=str_replace('\\','/',$class_name);
    //var_dump($class_name);
    //die();
    include $_SERVER['DOCUMENT_ROOT'] .'/'. $class_name . '.php';
});

//echo "init";


