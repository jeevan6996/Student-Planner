<html>
	<head>
	<title>Add Reminders</title>
	<link rel="stylesheet" href="userhome_style.css">
	</head>


	<body>
	<ul class="navbar">
    <li class="flt"><a class=active href="userhome.php">Attendance</a></li>
    <li class="flt"><a href="report.php">Attendance Report</a></li>
    <li class="flt"><a href="ToDoList.php">To Do List</a></li>
    <li class="flt"><a href="reminder.php">Reminders</a></li>
    <li class="flt" ><a href="login.php">Sign Out</a></li>
    </ul>
    <br><br>

		<form name="setup_reminder"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
</body>
</html>


<?php 

if(isset($_POST['submit']))
{

 $db = mysqli_connect('localhost','root','root','Trial')
 or die('Error connecting to MySQL server.');

echo $reminder_name;

$reminder_date = $_POST['reminder_year'].$_POST['reminder_month'].$_POST['reminder_date'];

$insert_Query=( "INSERT INTO reminder_events(reminder_name,reminder_desc,reminder_date) VALUES('".($_POST['reminder_name'])."','".($_POST['reminder_desc'])."','".($reminder_date)."')");

mysqli_query($db, $insert_Query);

}

//https://www.devarticles.com/c/a/MySQL/Setup-Your-Personal-Reminder-System-Using-PHP/1/

?>



