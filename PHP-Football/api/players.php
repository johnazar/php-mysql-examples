<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Contont-Type: application/json');
include '../config/init.php';

// Instantiate api object
$player =new PublicApi;

// Player query
$players = $player->getAllPlayers();
// Get row count
$total = count($players);


// Check if any we have result
if($total >0){
    // Return array = player and other info
$result_arr = array();
$result_arr['total'] = $total;
$result_arr['data'] = array(); // here goes players
// loop throught results
// add to result_arr['data']
foreach($players as $player){
    array_push($result_arr['data'], $player);
    
}
echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);

}else{
    $result_arr['data'] = ["message"=>"No data was found"];
    echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);
}
