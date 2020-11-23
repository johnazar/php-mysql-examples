<?php 
require "vendor/autoload.php";

$myArry = array(
    'person' => array(
        'f_name'=> 'Joe',
        'l_name'=> 'Doe'
    )
    
);
$firstname = data_get($myArry,'person.f_name');
//$firstname = $myArry['person']['f_name'];

echo $firstname;

?>