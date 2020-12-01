<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include '../config/init.php';

// Instantiate api object
$team =new PublicApi;

// Teams query
$teams = $team->getTeams();
// Get row count
$total = count($teams);


// Check if any we have result
if($total >0){
// Return array = team and other info
$result_arr = array();
$result_arr['total'] = $total;
$result_arr['data'] = array(); // here goes players
// loop throught results
// add to result_arr['data']
foreach($teams as $team){
    array_push($result_arr['data'], $team);
    
}
echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);

}else{
    $result_arr['data'] = ["message"=>"No data was found"];
    echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);
}
