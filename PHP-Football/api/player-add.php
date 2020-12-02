<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Method,Contont-Type,Access-Control-Allow-Method,Authorization, X-Requested-With');
include '../config/init.php';

// this returns null if not valid json
$recived_data = json_decode(file_get_contents("php://input"));

$data['first_name'] = htmlspecialchars(strip_tags($recived_data['first_name']));
$data['last_name'] = htmlspecialchars(strip_tags($recived_data['last_name']));
$data['team_id'] = htmlspecialchars(strip_tags($recived_data['team_id']));
$data['speed'] = htmlspecialchars(strip_tags($recived_data['speed']));
$data['position'] = htmlspecialchars(strip_tags($recived_data['position']));
$data['number'] = htmlspecialchars(strip_tags($recived_data['number']));
$data['img'] = '../public/img/uploads/placeholder.jpg';

// Instantiate api object
$player =new PublicApi;
$result_arr =array();
$result_arr['data'] = array();

if($player->create($data)){
    $result_arr['data'] = ["message"=>"Player has been added"];
    echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);

}else{
    $result_arr['data'] = ["message"=>"Player has not been added"];
    echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);

}
