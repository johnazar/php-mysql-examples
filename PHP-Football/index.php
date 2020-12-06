<?php include_once 'config/init.php'; ?>
<?php
$player =new Player;
//create template
$template = new Template('templates/frontpage.php');

// Set variables
$team =isset($_GET['team'])?$_GET['team']:null;

if($team!=0){
    $template->title = 'Players from '. $player->getTeam($team)->name;
    $template->players = $player->getByTeam($team);

}else{
    $template->title = 'Latest Players';
    $template->players = $player->getAllPlayers();
}


if (isset($_POST['searchq'])) {
    $template->players = $player->findPlayer($_POST['searchq']);
    if($template->players>0){
        $template->title = 'Search Results for'. $_POST['searchq'];

    }else{
        $template->title = 'No results found';
    }
    
    
  }


// retrive teams
$template->teams = $player->getTeams();
//display template
echo $template;