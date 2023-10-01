<?php
	$db = mysqli_connect('localhost','root','root','SMS')
 or die('Error connecting to MySQL server.');
    //$rowID = mysqli_query($db,"select LoggedInStudent()");
	//$LoggedInStudentID = mysqli_fetch_array($rowID);
	echo $LoggedInStudentID[0];
?>

<html>
	<head>
	<title>List of Reminders</title>
	</head>
<body>
	<table width="90%" border="0" align="center">
		<tr>
			<td colspan='3'><a href='reminder_setup.php'>Add new Reminder</a></td>
		</tr>
	
	<?php
		$result = mysqli_query( $db,"SELECT * FROM Reminder_Transaction WHERE StudentID = '".$LoggedInStudentID[0]."'" );
		$nr = mysqli_num_rows( $result );
		if(empty($nr))
		{
			echo("
			<tr>
			<td colspan='3'>No Reminders setup</td>
			</tr>
			");
		}
		while( $row = mysqli_fetch_array( $result ))
		{
			$reminder_name = $row["reminder_name"];
			$reminder_desc = $row["reminder_desc"];
			$reminder_date = $row["reminder_date"];
			$reminder_id = $row["reminder_id"];
			echo("
			<tr>
			<td width='25%'>$reminder_name</td>
			<td width='40%'>$reminder_desc</td>
			<td width='25%'>$reminder_date</td>
			<td width='10%'><a href='reminder_delete.php?reminder_id=$reminder_id'>delete</a></td>
			</tr>
			");
		}
		mysqli_free_result( $result );
	?>

	</table>
	</body>
</html>

