<?php
//Cookies Test
$cookie_name = "user";
$cookie_value = "John";
//$cookie_value = session_save_path(); // get session path
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
// Start the session
//include auth.php file on all secure pages
include("auth.php");

?>
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") // Post
{
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL, Define http or https";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  // Post end
  // Define User Class
  class User{
      private $uname;
      private $uemail;
      public function __construct($uname, $uemail) {
          $this->uname = $uname;
          $this->uemail = $uemail;
      }
      public function loguser() {
          return $this->uname . "'s login is " . $this->uemail . "!";
      }
  }
  // Create new user
  
    $user = new User($name,$email);
    // uncomment to log
    //logtofile($user);


}

function logtofile($user){
  // Prepare data
  $content = "at ". date("H:i:s") . " " . $user->loguser() . "\n";
  $fileName =  "submitlogs/".date("Y-m-d").".txt"; // Set file name
  $myfile = fopen($fileName, "a") or die("Unable to open file!");
  //var_dump($content);
  fwrite($myfile, $content);
  fclose($myfile);
} 
// Check the input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
// Callback function demo
function exclaim($str1) {
  return $str1 . "!<br>";
}

function ask($str2) {
  return $str2 . "?<br>";
}

function printFormatted($str3, $format) {
  // Calling the $format callback function
  echo $str3($format);
}

// Pass "exclaim" and "ask" as callback functions to printFormatted()
echo "<h2>Callback function:</h2>";
echo printFormatted("exclaim" ,"Hello ".$name);
echo printFormatted("ask","Who is ".$name);
?>

<?php
// Display inputs
echo "<h2>Your Input:</h2>";
echo "Name: ".$name. "<br>";
echo "E-mail: ".$email."<br>";
echo "Website: ".$website."<br>";
echo "Comment: ".$comment."<br>";
echo "Gender: ".$gender."<br>";
?>

<div>
<?php
// Display Cookies info
echo "<h2>Cookies:</h2>";
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
</div>
<div>

<?php
// Display Session info
echo "<h2>Session:</h2>";
echo "Session name: " . session_name() . "<br>";
echo "Session ID: " . session_id(). "<br>";
echo "You are logged in as " . $_SESSION["auth"]. "<br>";
?>



</div>
<div>
<a href="logout.php">Logout</a>
</div>
<script>
if (typeof(Storage) !== "undefined") {
  // Code for localStorage/sessionStorage.
  console.log(localStorage);
} else {
  // Sorry! No Web Storage support..
  console.log('Sorry! No Web Storage support');
}
</script>

</body>
</html>