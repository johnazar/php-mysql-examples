<?php include_once 'config/init.php'; ?>
<?php
$player =new Player;
// Set variables
$player_id =isset($_GET['id'])?$_GET['id']:null;

if(isset($player_id)){
    //create template
$template = new Template('templates/player-single.php');

$template->player = $player->getPlayer($player_id);
}
else{
        redirect('index.php','Player was not found','error');
    }


//display template
echo $template;