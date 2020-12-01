<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Contont-Type: application/json');
include '../config/init.php';

$player_id = isset($_GET['id'])?$_GET['id']:die();

// Instantiate api object
$player_obj =new PublicApi;

// Player query
$player = $player_obj->getPlayer($player_id );
if($player == true){
    // Return array = player and other info
    $result_arr = array();
    $result_arr['data'] = array(); // here goes players
    array_push($result_arr['data'], $player);
        
    echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);

}else {
    $result_arr['data'] = ["message"=>"No data was found"];
    echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);
}
