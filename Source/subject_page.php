<!DOCTYPE >
<html>
<head>
<meta charset="utf-8">
<title>Subject Page</title>

<link rel="stylesheet" href="subject_style.css">

<script type="text/javascript">

var i = 0;

function addInput(f) 
{
	var aInputs=f.getElementsByTagName('input');
	for(i=0; i<aInputs.length; i++)
	{
    	if(aInputs[i].className=='hide')
    	{
        	aInputs[i].className='';
        	break;
        }
    }
    
}

/*
function showValue(newValue)
{
	document.getElementById("range").innerHTML=newValue;
}
*/

function getSubCnt()
{
	document.getElementById("cnt").value=i+1;
}	

</script>

<style type="text/css">
 
 input {display:block;}
 .hide {display:none;} 

</style>

</head>

<?php
 
 //define variables and set to empty values
 $Sub1 = $Sub2 = $Sub3 = $Sub4 = $Sub5 = $Sub6 = $Sub7 = $Sub8 = $Sub9 = $Sub10 = "";
 $SubErr1 = $SubErr2 = $SubErr3 = $SubErr4 = $SubErr5 = $SubErr6 = $SubErr7 = $SubErr8 = $SubErr9 = $SubErr10 = "";
 $count = "";
 
 if( $_SERVER["REQUEST_METHOD"] == "POST") 
 {
  	  if (empty($_POST["txt1"])) 
		$SubErr1 = "Subject Required.";
	  else 
	  	$Sub1 = test_input($_POST["txt1"]);
	  
	  
	  if (empty($_POST["txt2"])) 
	  	$SubErr2 = "Subject Required.";
	  else 
	  	$Sub2 = test_input($_POST["txt2"]);
	  	 
	  if (empty($_POST["txt3"])) 
	  	$SubErr3 = "Subject Required.";
	  else 
	  	$Sub3 = test_input($_POST["txt3"]);
	  	  
	  if (empty($_POST["txt4"])) 
	  	$SubErr4 = "Subject Required.";
	  else 
	  	$Sub4 = test_input($_POST["txt4"]);
	  
	  if (empty($_POST["txt5"])) 
	  	$SubErr5 = "Subject Required.";
	  else 
	  	$Sub5 = test_input($_POST["txt5"]);
	  	  
	  if (empty($_POST["txt6"])) 
	    $SubErr6 = "Subject Required.";
	  else 
	  	$Sub6 = test_input($_POST["txt6"]);
	  
	  if (empty($_POST["txt7"])) 
	    $SubErr7 = "Subject Required.";
	  else 
	    $Sub7 = test_input($_POST["txt7"]);
	  
	  if (empty($_POST["txt8"])) 
	  	$SubErr8 = "Subject Required.";
	  else 
	  	$Sub8 = test_input($_POST["txt8"]);
	  
	  if (empty($_POST["txt9"])) 
	    $SubErr9 = "Subject Required.";
	  else 
	  	$Sub9 = test_input($_POST["txt9"]);
	  	  
	  if (empty($_POST["txt10"])) 
	  	$SubErr10 = "Subject Required.";
	  else 
	    $Sub10 = test_input($_POST["txt10"]);
	  	  
	  
	  $count = test_input($_POST["countSub"]);
  
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

	<br><br>
	<div class="signupbox">
		<img src="logo.png" class="user">
		<h2 style = "text-align:center"><b>Subject Details</b></h2>
		<br>
	    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
	        <hr><br>
			<lable>Your Subjects</label> &nbsp
			<br> 
			<input class="hide" type="text" name="txt1" value="<?php echo $Sub1; ?>" placeholder="Subject 1	">
			&nbsp <span class="hide" color="Cyan">* <?php echo $Sub1Err; ?></span> <br>
			<input class="hide" type="text" name="txt2" value="<?php echo $Sub2; ?>" placeholder="Subject 2	"> 
			<!-- &nbsp  <span class="error">* <?php echo $Sub2Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt3" value="<?php echo $Sub3; ?>" placeholder="Subject 3">
			<!-- &nbsp  <span class="error">* <?php echo $Sub3Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt4" value="<?php echo $Sub4; ?>" placeholder="Subject 4">
			<!-- &nbsp  <span class="error">* <?php echo $Sub4Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt5" value="<?php echo $Sub5; ?>" placeholder="Subject 5">
			<!-- &nbsp  <span class="error">* <?php echo $Sub5Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt6" value="<?php echo $Sub6; ?>" placeholder="Subject 6">
			<!-- &nbsp  <span class="error">* <?php echo $Sub6Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt7" value="<?php echo $Sub7; ?>" placeholder="Subject 7">
			<!-- &nbsp  <span class="error">* <?php echo $Sub7Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt8" value="<?php echo $Sub8; ?>" placeholder="Subject 8">
			<!-- &nbsp  <span class="error">* <?php echo $Sub8Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt9" value="<?php echo $Sub9; ?>" placeholder="Subject 9">
			<!--&nbsp  <span class="error">* <?php echo $Sub9Err; ?></span> <br> -->
			<input class="hide" type="text" name="txt10" value="<?php echo $Sub10; ?>" placeholder="Subject 10">
			<!-- &nbsp  <span class="error">* <?php echo $Sub10Err; ?></span> <br> --> 
			
			<button type="button" onclick="addInput(this.form);getSubCnt();">Add</button><br><br><hr><br>
			
			<input type="hidden" id="cnt" name="countSub" value="0">
			
			<br>
			
			<lable>Your Attendance Criteria</label> &nbsp 			
			<br>
			<br>
			<input type="number" name="Attendance">
			<hr>
			<br><br>
			<br><br>
			<input type="submit" name="Next" value="Next">
			<br>
			<input type="reset" name="Reset-All" value="Reset">

			<br><br>
		</form>
	</div>		

<?php
          
     
	 if(isset($_POST["Next"]))
	 {
	    $db = mysqli_connect('localhost','root','root','SMS')
	    or die('Error connecting to MySQL server.');
	 
	    $query = "SELECT MAX(Student_ID) from Student_Master";
	    $result = mysqli_query($db,$query); 
	    $row = mysqli_fetch_array($result);
	 
	    	
	 	if($_POST["countSub"] > 0)
	 	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt1"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 1)
	   	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt2"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 2)
	   	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt3"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 3)
	 	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt4"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 4)
	   	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt5"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 5)
	   	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt6"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 6)
	 	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt7"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 7)
	   	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt8"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}
	   	
	   	if($_POST["countSub"] > 8)
	   	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt9"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}

		if($_POST["countSub"] > 9)
	   	{		
	   		$insertQuery1 = ("INSERT INTO Subject_Master(StudentID,Subject_Name) VALUES($row[0],'".$_POST["txt10"]."')");
	   		mysqli_query($db, $insertQuery1);
	   	}

	    $insertQuery2 = ("UPDATE Student_Master SET Attendance_criteria = '".$_POST["Attendance"]."'");
	   	mysqli_query($db, $insertQuery2);
	   	
	   mysqli_close($db);
	   header("location:ttpage.php"); 
	 }
?>

</body>
</html>
