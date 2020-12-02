<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
include '../config/init.php';
//die($_GET['q']);

$method = $_SERVER['REQUEST_METHOD'];
// get query
$q=$_GET['q'];
$req=explode('/',$q);

$type = $req[0];
$player_id=isset($req[1])?$req[1]:null;

// prepare result
$result_arr = array();
$result_arr['data'] = array(); // here goes players
// Instantiate api object
$player_obj =new PublicApi;


switch ($method) {
    case 'GET':


        if($type=='players'){
            if(isset($player_id)){
                //getplayer with id
                // Player query
                $player = $player_obj->getPlayer($player_id);
                if($player == true){
                    // Return array = player and other info
                    array_push($result_arr['data'], $player);
                }else{
                    http_response_code(404);
                    $result_arr['data'] = [
                        "status"=>false,
                        "message"=>"No data was found"];
                }
            }else{

                // Player query
                $players = $player_obj->getAllPlayers();
                // Get row count
                $total = count($players);
                if($total >0){
                    // Return array = player and other info
                    $result_arr['total'] = $total;

                    // loop throught results
                    // add to result_arr['data']
                    foreach($players as $player){
                    array_push($result_arr['data'], $player);

                    }
                }
            }
            
        }else{
            $result_arr['data'] = ["message"=>"No data was found"];
            
        }
        break;
    case 'POST':
        # code...
        break;

    default:
        # code...
        break;
}
















echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);



?>