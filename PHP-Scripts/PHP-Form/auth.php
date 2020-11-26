<?php

session_name('Private');// naming is optinal
session_start();
if(!isset($_SESSION["auth"])) // check if the session is authorized to enter a secure page
{
header("Location: login.php");
exit(); }
?>