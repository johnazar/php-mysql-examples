<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Contont-Type: application/json');
include '../../config/init.php';

// Instantiate player object
$player =new Player;

// Player query
$players = $player->getAllPlayers();

// Get row count TODO

// Check if any we have result

// Return array = player and other info
$result_arr = array();
$result_arr['data'] = array(); // here goes players
// loop throught results
// add to result_arr['data']
foreach($players as $player){
    array_push($result_arr['data'], $player);

}


// Turn $result_arr into json
echo json_encode($result_arr);

// outpot