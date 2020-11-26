<?php

session_name('Private');
session_start();
// Destroying All Sessions
if(session_destroy())
{
    session_unset();
// Redirecting To Home Page
header("Location: index.php");
}
?>