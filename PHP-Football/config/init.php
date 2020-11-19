<?php
//Start session
session_start();

// config file
require_once 'config.php';

// include helper
require_once 'helpers/system_helper.php';
// Autoloader : it will inculde the file of class when ever is used
/* function __autoload($class_name){
    require_once 'lib/'.$class_name.'.php';    
} */

// Начиная с версии PHP 5.3.0 можно использовать анонимные функции
spl_autoload_register(function ($class_name) {
    include 'lib/' . $class_name . '.php';
});

//echo "init";


