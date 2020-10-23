<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
session_start();
// If form submitted, insert values into the database.
if (isset($_SESSION["auth"])){
    echo "You are logged in as". $_SESSION["auth"]."<br>";

}else{
    echo "You are not logged in"."<br>". $_SESSION["auth"]."<br>";
    echo "<a href='loginme.php'>Login</a>";

}?>