<?php 
require __DIR__ . '/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$myArry = array(
    'person' => array(
        'f_name'=> 'Joe',
        'l_name'=> 'Doe'
    )
    
);
$firstname = data_get($myArry,'person.f_name');
//$firstname = $myArry['person']['f_name'];

echo $firstname;


// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler('my_log.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());
// You can now use your logger
$logger->info('My logger is now ready');
// You can now use your logger

echo $logger;


?>