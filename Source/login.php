<!DOCTYPE >
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="login_style.css">
</head>

<?php
     
	 $db = mysqli_connect('localhost','root','root','SMS')
	 or die('Error connecting to MySQL server.');
	 
	 //Logout All Previously Logged-in Users
	 $resetLogin = mysqli_query($db,"call ResetLoginTransaction()");
	 
	 mysqli_close($db);
?>

<?php
 
 //Define variables and set to empty values
 $usernameErr = $passwordErr = "";
 $username = $password = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
  
	  if (empty($_POST["UN"])) 
	  {
		$usernameErr = "Username Required.";
	  } 
	  
	  else 
	  {
		$username = test_input($_POST["UN"]);
	  }
	  
	  if (empty($_POST["PSWD"])) 
	  {
		$passwordErr = "Password Required.";
	  } 
	  
	  else
	  {
		$password = $_POST["PSWD"];
	  }
  
 }   
 
 function test_input($data) 
 {
	  $data = trim($data);              //Trim extra white-spaces,lines etc.
	  $data = stripslashes($data);      //Strips off backslashes in the input
	  $data = htmlspecialchars($data);  //Converts special chars into HTML entities for security reasons
	  return $data;
 }
 
?>

<body>
<div class="loginbox">
	<img src="logo.png" class="user">
	<h2>Login</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<p>Username</p> &nbsp<span class="error">*<?php echo $usernameErr; ?></span>
		<input type="text" name="UN" value="<?php echo $username ?>" placeholder="Username"> 
		
		<br><br>
		<p>Password</p> &nbsp<span class="error">*<?php echo $passwordErr; ?></span>
		<input type="password" name="PSWD" placeholder="*******">
		
		<br><br>
		<input type="submit" name="Login" value="Login">
		<a href="#"> Forgot password<br><br>
		<po><a href="signUpPage.php"> <h1>Sign Up</h1></po>
	</form>
<div>
</body>
</html>

<?php

 //Connecting if NO ERROR , and insert into the Tables
 
 if($usernameErr == "" && $passwordErr == "" && $_SERVER["REQUEST_METHOD"] == "POST")
 { 
	 $db = mysqli_connect('localhost','root','root','SMS')
	 or die('Error connecting to MySQL server.');
	 
	 $query = "SELECT User_Name,Password FROM Login_Master where User_Name = '".$username."'";
	 $result = mysqli_query($db,$query);
     $row = mysqli_fetch_array($result);

     if($row != "")
     {
     	$dbUsername = $row['User_Name'];
     	$dbPassword = $row['Password'];
	 
	 	if($password == $dbPassword)
    	{
    		//echo '<script language="javascript">';
			//echo 'alert("Logged In")';
			//echo '</script>';
			echo "<script> window.location.assign('userhome.php'); </script>";
			
			$query = "UPDATE Login_Transaction Set Login_Status='Y' WHERE UserName = '".$dbUsername."'";
			$result = mysqli_query($db,$query);
    		
        }
        
        else
        {
            echo '<script language="javascript">';
			echo 'alert("Incorrect Password")';
			echo '</script>';
        }     
     }
     
     else
     {
     	echo '<script language="javascript">';
	    echo 'alert("Incorrect Username.")';
	    echo '</script>';	
     }
     
     mysqli_close($db);
     
  }
 
?>

