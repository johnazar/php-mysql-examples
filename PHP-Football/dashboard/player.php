<?php include_once 'config/init.php'; ?>
<?php require_once 'config/auth.php'; ?>
<?php
$player =new Player;
// Set variables
$player_id =isset($_GET['id'])?$_GET['id']:null;

// Delete player
/* if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($player->delete($del_id)){
        redirect('index.php','Player Deleted','success');
    }else{
        redirect('index.php','Player was not deleted','error');
    }

} */

//create template
$template = new Template('templates/player-single.php');




$template->player = $player->getPlayer($player_id);





//display template
echo $template;