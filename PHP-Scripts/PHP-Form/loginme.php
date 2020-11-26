<?php

session_name('Private');
session_start();
// Destroying All Sessions
$_SESSION["auth"] ="JoeDoe";
// Redirecting To Home Page
header("Location: index.php");

?>