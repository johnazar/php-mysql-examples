<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin,Access-Control-Allow-Method,Contont-Type');
include '../config/init.php';
//die($_GET['q']);
use lib\PublicApi as PublicApi;

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
                    $result_arr['status'] = [
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
            http_response_code(404);
            $result_arr['status'] = [
                "status"=>false,
                "message"=>"No data was found"];
            $result_arr['data'] = ["message"=>"No data was found"];
            
        }
        break;
    case 'POST':
        if($type=='players'){
            // this returns null if not valid json
            $recived_data = json_decode(file_get_contents("php://input"));
            //var_dump($recived_data);
            //$recived_data = $_POST;
            $data=array();
            $data['first_name'] = htmlspecialchars(strip_tags($recived_data->first_name));
            $data['last_name'] = htmlspecialchars(strip_tags($recived_data->last_name));
            $data['team_id'] = htmlspecialchars(strip_tags((int)$recived_data->team_id)); 
            $data['speed'] = htmlspecialchars(strip_tags((int)$recived_data->speed));
            $data['position'] = htmlspecialchars(strip_tags((int)$recived_data->position));
            $data['number'] = htmlspecialchars(strip_tags((int)$recived_data->number));
            $data['img'] = '../public/img/uploads/placeholder.jpg';
            //var_dump($data);
            //die();

            $latest_id =$player_obj->create($data);
            
            if(isset($latest_id)){
                        
                http_response_code(201);
                $result_arr['status'] = [
                    "status"=>true,
                    "message"=>"Player has been added"];
                $result_arr['data'] = ["message"=>"Player ID".$latest_id." has been added"];

            }else{
                $result_arr['data'] = ["message"=>"Player has not been added"];
            }

        }
        break;
    case 'PATCH':
        if($type=='players'){
            // this returns null if not valid json
            $recived_data = json_decode(file_get_contents("php://input"));
            //var_dump($recived_data);
            //$recived_data = $_POST; /player/5
            $data=array();
            $data['id'] = htmlspecialchars(strip_tags($recived_data->id));
            $data['first_name'] = htmlspecialchars(strip_tags($recived_data->first_name));
            $data['last_name'] = htmlspecialchars(strip_tags($recived_data->last_name));
            $data['team_id'] = htmlspecialchars(strip_tags((int)$recived_data->team_id));
            $data['speed'] = htmlspecialchars(strip_tags((int)$recived_data->speed));
            $data['position'] = htmlspecialchars(strip_tags((int)$recived_data->position));
            $data['number'] = htmlspecialchars(strip_tags((int)$recived_data->number));
            $data['img'] = '../public/img/uploads/placeholder.jpg';
          
            
            if($player_obj->update($data['id'],$data)){
                        
                http_response_code(204);
                $result_arr['status'] = [
                    "status"=>true,
                    "message"=>"Player has been updated"];
                $result_arr['data'] = ["message"=>"Player ID ".$data['id']." has been updated"];

            }else{
                $result_arr['data'] = ["message"=>"Player has not been updated"];
            }
            $result_arr['data'] = ["message"=>"Player has not been updated"];

        }
        break;
    case 'DELETE':
        if($type=='players'){
            if(isset($player_id)){
                if($player_obj->delete($player_id)){
                    http_response_code(200);
                    $result_arr['status'] = [
                    "status"=>true,
                    "message"=>"Player has been deleted"];
                    $result_arr['data'] = ["message"=>"Player ID ".$player_id." has been deleted"];

                }

            }
            //$result_arr['data'] = ["message"=>"Player has not been deleted"];
        }else{
            $result_arr['data'] = ["message"=>"Player has not been deleted"];

        }

        break;


    default:
        # code...
        break;
}



echo json_encode($result_arr, JSON_UNESCAPED_UNICODE);



?>