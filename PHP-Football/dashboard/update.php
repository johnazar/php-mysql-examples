<?php include_once 'config/init.php'; ?>
<?php require_once 'config/auth.php'; ?>
<?php
$player =new Player;
// Set variables
$player_id =isset($_GET['id'])?$_GET['id']:null;
//var_dump($player_id);
if(isset($_POST['submit'])){
    //create Data Array
    $data = array();
    $id = htmlspecialchars($_POST['id']);
    $data['first_name'] = htmlspecialchars($_POST['first_name']);
    $data['last_name'] = htmlspecialchars($_POST['last_name']);
    $data['team_id'] = htmlspecialchars($_POST['team_id']);
    $data['speed'] = htmlspecialchars($_POST['speed']);
    $data['position'] = htmlspecialchars($_POST['position']);
    $data['number'] = htmlspecialchars($_POST['number']);
    $data['img'] = htmlspecialchars($_POST['currimg']);

    if($_FILES['img']['size']>0){
        $file = $_FILES['img']; // get info about the file
        $fileName = $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileSize = $_FILES['img']['size'];
        $fileError = $_FILES['img']['error'];
        $fileType = $_FILES['img']['type'];
    
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
    
        $allowed = array('jpg','jpeg','png');
        if (in_array($fileActualExt,$allowed)) {
            if ($fileError === 0) {
                if ($fileSize< 500000) {
                    $fileNameNew = uniqid().".".$fileActualExt;
                    $fileDestination = '../public/img/uploads/'. $fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $data['img'] = $fileDestination;
                    //header("Location: index.php?sucess");
                } else {
                    echo "The file is too big";
                }
            } else {
                redirect('index.php', 'There was an error while uploading file', 'error');
                //echo "There was an error while uploading file";
            }
        }else {
            echo "You can not upload file of this type";
        }
    }

    if($player->update($id,$data)){
        redirect('index.php', 'Your player has been updated', 'success');
    }else{
        redirect('index.php', 'Something went wrong', 'error');
    }
    
}




//create template
$template = new Template('templates/player-update.php');

$template->player = $player->getPlayer($player_id);

$template->teams = $player->getTeams();

//display template
echo $template;