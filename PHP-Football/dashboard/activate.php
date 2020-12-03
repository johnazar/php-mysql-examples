<?
$accesscode =md5(uniqid());
//print_r($accesscode);
$id =1;
$body = "Thank for registering\n";
$body .= "please activate you account\n";
$body .= "https://".$_SERVER['HTTP_HOST']."/activate.php?x=".$id."&y=".$accesscode;

print_r($body);
if(isset($_GET['y'])&&isset($_GET['x'])){
    $y =$_GET['y'];
    $x =(int)$_GET['x'];
    if($x>0 && (strlen($y)==32)){ //md5
        $query ="UPDATE users SET active = TRUE WHERE (id=$id & active=$y) LIMIT 1";
    }
}