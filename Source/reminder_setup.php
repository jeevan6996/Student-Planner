<?php
	$db = mysqli_connect('localhost','root','root','SMS')
 or die('Error connecting to MySQL server.');
    $rowID = mysqli_query($db,"select LoggedInStudent()");
	$LoggedInStudentID = mysqli_fetch_array($rowID);
	//echo $LoggedInStudentID[0];

?>

<html>
	<head>
	<title>Add Reminders</title>
	<link rel="stylesheet" href="updateatt_style.css">
	</head>
	
	
	<body>
	
  <ul class="navbar">
  <li class="flt"><a class=active href="userhome.php">Attendance</a></li>
  <li class="flt"><a href="report.php">Attendance Report</a></li>
  <li class="flt"><a href="ToDoList.php">To Do List</a></li>
  <li class="flt"><a href="reminder_setup.php">Reminders</a></li>
  <li class="flt" ><a href="login.php">Sign Out</a></li>
  </ul>
	<div class="signupbox">
	<form name="setup_reminder" action="reminder_setup.php" method="post">
		<table border='0' align='center'>
		<tr>
			<td>Event:</td>
			<td>
			<input name="reminder_name" type="text" maxlength="255" />
			</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
			<textarea name="reminder_desc" rows="5" /></textarea>
			</td>
		</tr>
		<tr>
			<td>Trigger Date</td>
			<td>
			<select name="reminder_year">
			<?php
				$current_year = date("Y");
				for($counter=$current_year;$counter<=$current_year+2;$counter++)
				{
					echo("\n<option>$counter</option>");
				}
			?>
			</select>
			<select name="reminder_month">
			<?php
			for($counter=1;$counter<=12;$counter++)
			{
				if($counter < 10)
					$prefix = "0";
				else
					$prefix = "";
				echo("\n<option>$prefix$counter</option>");
			}
			?>
			</select>
			<select name="reminder_date">
			<?php
			for($counter=1;$counter<=31;$counter++)
			{
				if($counter < 10)
					$prefix = "0";
				else
					$prefix = "";	
				echo("\n<option>$prefix$counter</option>");
			}
			?>
			</select>
			</td>
		</tr>
		<tr>
			<td> </td>
			<td>
			<input name="step" type="hidden" value="1" />
			<br><br>
			<input name="submit" type="submit" value="Set" />
			</td>
		</tr>
	</table>
	</form>
	
	<hr>
	
	<table width="90%" border="0" align="center">
		<tr>
			<td colspan='3'><a href='reminder_setup.php'>Add new Reminder</a></td>
		</tr>
	
	<?php
		$result = mysqli_query( $db,"SELECT * FROM Reminder_Transaction where StudentID = '".$LoggedInStudentID[0]."'" );
		$nr = mysqli_num_rows( $result );
		if(empty($nr))
		{
			echo("
			<tr>
			<td colspan='3'>No Reminders Setup.</td>
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


	</div>
	</body>
</html>



<?php
    
    if(isset($_POST["submit"]))
	{
		$error_list = "";
		$todays_date = date( "Y-m-d" );
		$reminder_date = $_POST['reminder_year'].'-'.$_POST['reminder_month'].'-'.$_POST['reminder_date'];

		if( empty($_POST['reminder_name']) )
			$error_list .= "No Reminder Name<br>";
		if( !checkdate( $_POST['reminder_month'], $_POST['reminder_date'], $_POST['reminder_year'] ))
			$error_list .= "Reminder Date is invalid<br>";
		else if( $reminder_date <= $todays_date )
			$error_list .= "Reminder Date IS A PAST DATE<br>";

		if( empty( $error_list ) )
		{
			$insert_Query=( "INSERT INTO Reminder_Transaction(reminder_name,reminder_desc,reminder_date,StudentID) VALUES('".addslashes($_POST['reminder_name'])."', '".addslashes($_POST['reminder_desc'])."','".addslashes($reminder_date)."','".$LoggedInStudentID[0]."')" );

		mysqli_query($db,$insert_Query);

		 //Header("Refresh: 1;url=reminder_list.php");
		 header("location:reminder_setup.php");
		}
		else
		{
			echo( $error_list );
		}
	
	}
	
?>


