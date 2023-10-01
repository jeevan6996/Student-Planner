<?php
// define variables and set to empty values

$firstNameErr = $lastNameErr = $genderErr = $usernameErr = $passwordErr = $confirmPassErr =  $emailErr = $contactErr = "";
$firstName = $lastName = $gender = $username = $password = $confirmPass = $email = $contact = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
  if (empty($_POST["FN"])) 
  {
    $firstNameErr = "First Name Required.";
  } 
  
  else 
  {
    $firstName = test_input($_POST["FN"]);
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$firstName)) 
    {
      $firstNameErr = "Only Alphabets And White Spaces Allowed.";
    }
    
  }

  if (empty($_POST["LN"])) 
  {
    $lastNameErr = "Last Name Required.";
  } 
  
  else 
  {
    $lastName = test_input($_POST["LN"]);
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$lastName)) 
    {
      $lastNameErr = "Only Alphabets And White Spaces Allowed.";
    }
    
  }
  
  
  if (empty($_POST["Gender"])) 
  {
    $genderErr = "Gender Field Required.";
  } 
  
  else
  {
    $gender = test_input($_POST["Gender"]);
  }
  
  if (empty($_POST["UN"])) 
  {
    $usernameErr = "Username Required.";
  } 
  
  else 
  {
    $username = test_input($_POST["UN"]);
    
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9!@#$%^&*.]*$/",$username)) 
    {
      $usernameErr = "Only Alphabets,Special Symbols And Numbers Allowed.";
    }
    
  }
  
  if (empty($_POST["PSWD"])) 
  {
    $passwordErr = "Password Required.";
  } 
  
  else
  {
    $password = $_POST["PSWD"];
  }
  
  if (empty($_POST["CPSWD"])) 
  {
    $confirmPassErr = "Confirm Your Password.";
  } 
  
  else
  {
    $confirmPass = $_POST["CPSWD"];
    
    if($confirmPass != $password)
    {
     $confirmPassErr = "Passwords Don't Match !";
    }
  }
    
  if (empty($_POST["EMAIL"])) 
  {
    $emailErr = "E-mail Field Required.";
  } 
  
  else 
  {
    $email = test_input($_POST["EMAIL"]);
 
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid E-mail.";
    }
    
  }
  
  if (empty($_POST["CON"])) 
  {
    $contactErr = "Contact Field Required.";
  } 
  
  else 
  {
    $contact = test_input($_POST["CON"]);
 
    // check if contact number is well-formed
    if (!preg_match('/^[0-9]{10}+$/', $contact)) 
    {
      $contactErr = "Invalid Contact Number. (10-Digits Only)";
    }
    
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

<html>

<head>
	<link rel="stylesheet" href="SignUp_style.css">
	<title>Sign Up</title>		
</head>

<body>


		<br><br>
		<div class="signupbox">
		<img src="logo.png" class="user">
		<h2 style = "text-align:center"><b>Sign Up</b></h2>
		<br>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  > 
	        
			<lable>FIRST NAME  </label> &nbsp  <span class="error">* <?php echo $firstNameErr; ?></span><br>
			<input type="text" name="FN" value="<?php echo $firstName; ?>" placeholder=" First Name"> 
			<br><br>

			<label>LAST NAME  </label> &nbsp <span class="error">* <?php echo $lastNameErr; ?></span><br>
			<input type="text" name="LN" value="<?php echo $lastName; ?>"  placeholder=" Last Name"> 
			<br><br>
			
			<label> GENDER : </label> &nbsp <span class="error">* <?php echo $genderErr; ?></span><br>
			<input type="radio" name="Gender" <?php if (isset($gender) && $gender=="M") echo "checked";?> value="M">MALE <br>
			<input type="radio" name="Gender" <?php if (isset($gender) && $gender=="F") echo "checked";?> value="F">FEMALE
			<br><br>
			
			<label> USER NAME  </label> &nbsp <span class="error">* <?php echo $usernameErr; ?></span><br>
			<input type="text" name="UN" value="<?php echo $username; ?>" placeholder=" Username"> 
			<br><br>
			
			<label> PASSWORD : </label> &nbsp <span class="error">* <?php echo $passwordErr; ?></span><br>
			<input type="password" name="PSWD" value="<?php echo $password; ?>" placeholder="*********"> 
			<br><br>
			
			<label> CONFIRM<br>PASSWORD : </label> &nbsp <span class="error">* <?php echo $confirmPassErr; ?></span><br>
			<input type="password" name="CPSWD" value="<?php echo $confirmPass; ?>" placeholder="*********"> 
			<br><br>
						
			<label> EMAIL ID : </label> &nbsp <span class="error">* <?php echo $emailErr; ?></span><br>
			<input type="text" name="EMAIL" value="<?php echo $email; ?>" placeholder=" abc@xyz.com"> 
			<br><br>
			
			<label> CONTACT : </label> &nbsp <span class="error">* <?php echo $contactErr; ?></span><br>
			<input type="text" name="CON" value="<?php echo $contact; ?>" placeholder="10-Digit Contact Number"> 
			<br><br>

					
			<input type="submit" name="Next-pg" value="Next">
			<input type="reset" name="Reset-All" value="Reset">
							
		</form>
		</div>

</body>
</html>


<?php

 if($firstNameErr == "" && $lastNameErr == "" && $genderErr == "" && $usernameErr == "" && $passwordErr == "" && $confirmPassErr == "" &&  $emailErr == "" && $contactErr == "" && $_SERVER["REQUEST_METHOD"] == "POST")
 { 
	 $db = mysqli_connect('localhost','root','root','SMS')
	 or die('Error connecting to MySQL server.');
	 	 
	 echo $row[0];
	 
	 if(isset($_POST['Next-pg']))
	 {
	   $insertQuery1 = ("INSERT INTO Student_Master(First_Name,Last_Name,Gender,Email,Contact,Attendance_Criteria) VALUES('".$_POST["FN"]."','".$_POST["LN"]."','".$_POST["Gender"]."','".$_POST["EMAIL"]."','".$_POST["CON"]."','0')");
	   mysqli_query($db, $insertQuery1);
	   
	   $query = "SELECT MAX(Student_ID) from Student_Master";
	   $result = mysqli_query($db,$query); 
	   $row = mysqli_fetch_array($result);
	 	     
	   $insertQuery2 = ("INSERT INTO Login_Master(User_Name,Password,StudentID) VALUES('".$_POST["UN"]."','".$_POST["PSWD"]."',$row[0])");
	   mysqli_query($db, $insertQuery2);
	   
	 }
	 
	 mysqli_close($db);
	 header("location:subject_page.php");
     
   /* echo '<script language="javascript">';
	echo 'alert("SignUp Successful. Login to Begin")';
	echo '</script>';*/

 }
?>


