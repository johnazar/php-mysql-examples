<?php
// config file
require_once 'config.php';
// Autoloader : it will inculde the file of class when ever is used
function __autoload($class_name){
    require_once 'lib/'.$class_name.'.php';    
}

echo "init";


