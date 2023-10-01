<?php
	$db = mysqli_connect('localhost','root','root','SMS')
 or die('Error connecting to MySQL server.');
 	//$rowID = mysqli_query($db,"select LoggedInStudent()");
	//$LoggedInStudentID = mysqli_fetch_array($rowID);
?>

<html>
	<body>
	<?php
     $reminder_id = $_GET['reminder_id'];
     //echo $reminder_id;
     $deleteQuery = ("Delete from Reminder_Transaction where reminder_id = $reminder_id");
	 mysqli_query($db,$deleteQuery);
	 header("location:reminder_setup.php");	  		  					
	?>
	</body>
</html>

