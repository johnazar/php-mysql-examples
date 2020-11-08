<?php

// Redirect to page
function redirect($page = FALSE, $message=NULL, $message_type=NULL){
    if(is_string($page)){
        $location = $page;
    }else{
        $location = $_SERVER['SCRIPT_NAME']; //is defined in the CGI 1.1 specification, and therefore is a standard. This means it should be available no matter what scripting language you're using.
    }

    //check for message
    if($message!=NULL){
        $_SESSION['message']=$message;
    }

    if($message_type!=NULL){
        $_SESSION['message_type']=$message_type;
    }

    header('Location: '.$location);
    exit;
}

//Display message - retrun a html
function displayMessage(){
    if(!empty($_SESSION['message'])){
        $message =$_SESSION['message'];
        if(!empty($_SESSION['message_type'])){
            $message_type =$_SESSION['message_type'];
            if($message_type == 'error'){
                echo '<div class="alert alert-danger">'.$message.'</div>';
            }else{
                echo '<div class="alert alert-success">'.$message.'</div>';
            }
        }

        //Unset Message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo '';
    }

    
}

