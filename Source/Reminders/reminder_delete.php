<?php
	$db = mysqli_connect('localhost','root','root','Trial')
 or die('Error connecting to MySQL server.');
?>

<html>
	<body>
	<?php
     $reminder_id = $_GET['reminder_id'];
     //echo $reminder_id;
     $deleteQuery = ("Delete from reminder_events where reminder_id = $reminder_id");
	 mysqli_query($db,$deleteQuery);
	 header("location:reminder_setup.php");	  		  					
	?>
	</body>
</html>

