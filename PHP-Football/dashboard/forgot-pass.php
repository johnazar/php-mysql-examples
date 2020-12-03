<?php
// Include config file
require_once "config/init.php";
 
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $message="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    
    // Validate credentials
    if(empty($username_err)){
        // Prepare a select statement
        $sql = "SELECT id, username ,email, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $email,$token);
                    if($stmt->fetch()){
                        
                        $subject= 'restor password';
                        //$p=substr(md5(uniqid()),3,8); create random password
                        $body = '<h2>Rest passwor request</h2>
                        <p>click the link below to rest your password</p>'.
                        'https://php.johnazar.com/forgot-pass.php?token='.$token
                        ;
                        // Email Headers
                        $headers = "MIME-Version: 1.0" ."\r\n";
                        $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

                        // Additional Headers
                        $headers .= "From: " .'admin'. "<".'email@johnazar.com'.">". "\r\n";
                        if(mail($email, $subject, $body, $headers)){
                            // Email Sent
                            $message= "a message has been sent successfully";
                        } else {
                            // Failed
                            $message= "could not sent email";
                        }
                        
                    }
                } else{
                    // Display an error message if username doesn't exist
                    //$username_err = "No account found with that username.";
                    $message= "a message has been sent successfully";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Restor password</h2>
        <p>Please fill in your login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validate()">
            <div class="form-group">
                <label>Username</label>
                <input type="text"id="username" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block" id="username_err"></span>
                <span class="help-block"><?php echo $message; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="submitbtn" value="Submit">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
    <script>
   
    function validate(){
        /* stop form from submitting normally */
        //event.preventDefault();
        let name=document.getElementById('username').value;
        console.log("check after click");
        console.log(name);
        if(name == "")
        {
        document.getElementById('username_err').innerHTML = 'Please Fill Name';
        console.log("stopped by JS");
        return false;
        }
        return true;
    }
        
    
    </script>
</body>
</html>