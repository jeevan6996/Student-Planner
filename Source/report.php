<!DOCTYPE >
<html>
<head>
<meta charset="utf-8">
<title>Reports</title>

<link rel="stylesheet" href="report_style.css">
</title>

</head>

<body >
  
  <ul class="navbar">
    <li class="flt"><a class=active href="userhome.php">Attendance</a></li>
    <li class="flt"><a href="report.php">Attendance Report</a></li>
    <li class="flt"><a href="ToDoList.php">To Do List</a></li>
    <li class="flt"><a href="reminder_setup.php">Reminders</a></li>
    <li class="flt" ><a href="login.php">Sign Out</a></li>
  </ul>

	
	<br><br>
	
	<h1 style="margin-top:5%;">Your Attendance Report</h1>
	<br><br>
	<div style="margin-left:13%;">
	&nbsp &nbsp &nbsp<a href="Reports/Function1.php" target="iframe_report"><button name="FUNC1" value="1">Percentage Analysis Report</button></a> 		&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="Reports/Function2.php" target="iframe_report"><button name="FUNC2" value="2">Lecture Analysis Report</button></a> 
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="Reports/Function3.php" target="iframe_report"><button name="FUNC3" value="3">Graphical Analysis Report</button></a>  
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="Reports/Function4.php" target="iframe_report"><button name="FUNC4" value="4">Detailed Analysis Report</button></a>
	</div>
	
	
	<iframe class="reportframe" src="Reports/frame_start.html" name="iframe_report">
	</iframe>
	

	


</body>
</html>
