<!DOCTYPE html>
<html lang="en-US">
<head>
<link rel="stylesheet" href="R2_style.css">
<?php
	 $db = mysqli_connect('localhost','root','root','SMS')
	 or die('Error connecting to MySQL server.');
	
	 $Username = $LoggedInStudentID = $First = $Last = '';
	
	 $rowID = mysqli_query($db,"select LoggedInStudent()");
	 $LoggedInStudentID = mysqli_fetch_array($rowID);
	
	 $rowUser = mysqli_query($db,"select UserName from Login_Transaction where Login_Status='Y'");
	 $Username = mysqli_fetch_array($rowUser);

	 $rowFirst = mysqli_query($db,"select First_Name from Student_Master where Student_ID ='".$LoggedInStudentID[0]."'");
	 $First = mysqli_fetch_array($rowFirst);
     
     $rowLast = mysqli_query($db,"select Last_Name from Student_Master where Student_ID ='".$LoggedInStudentID[0]."'");
	 $Last = mysqli_fetch_array($rowLast);
     
     $result = mysqli_query($db,"SELECT count(*) from Subject_Master where StudentID='".$LoggedInStudentID[0]."'");
	 $count = mysqli_fetch_array($result);
	 
	 $result = mysqli_query($db,"SELECT Attendance_Criteria from Student_Master where Student_ID ='".$LoggedInStudentID[0]."'");
	 $percentCriteria = mysqli_fetch_array($result);
	 
	 
	 //echo $percentCriteria[0];
	 //echo $count[0];
	 //echo $First[0];
     //echo $Last[0];
     //echo $LoggedInStudentID[0];
     //echo $Username[0];
	 
	 //Getting Subjects
     $Sub1 = $Sub2 = $Sub3 = $Sub4 = $Sub5 = $Sub6 = $Sub7 = $Sub8 = $Sub9 = $Sub10 = "";
     $i = 1;
     $result = mysqli_query($db,"SELECT Subject_Name from Subject_Master where StudentID='".$LoggedInStudentID[0]."'");
	 
	  while($row=mysqli_fetch_array($result))
	 {
	 
		  if($i == 1)
		  {
			$Sub1 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 2)
		  {
			$Sub2 = $row['Subject_Name'];
			//echo $Sub2;
		  }
		  
		  if($i == 3)
		  {
			$Sub3 = $row['Subject_Name'];
			//echo $Sub3.'<br>';
		  }
		  
		  if($i == 4)
		  {
			$Sub4 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 5)
		  {
			$Sub5 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 6)
		  {
			$Sub6 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 7)
		  {
			$Sub7 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 8)
		  {
			$Sub8 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 9)
		  {
			$Sub9 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 10)
		  {
			$Sub10 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		    
		  $i++;
	 }
	 
	 $Sub1Att = $Sub2Att = $Sub3Att = $Sub4Att = $Sub5Att = $Sub6Att = $Sub7Att = $Sub8Att = $Sub9Att = $Sub10Att = 0;
     $Sub1Total = $Sub2Total = $Sub3Total = $Sub4Total = $Sub5Total = $Sub6Total = $Sub7Total = $Sub8Total = $Sub9Total = $Sub10Total = 0;
     $Sub1Attended = $Sub2Attended = $Sub3Attended = $Sub4Attended = $Sub5Attended = $Sub6Attended = $Sub7Attended = $Sub8Attended = $Sub9Attended = $Sub10Attended = 0;
     $totalNotAttended=0;
           
     if($count[0]>0)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub1."')");
	   $Sub1Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub1."')");
	   $Sub1Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub1."')");
	   $Sub1Attended = mysqli_fetch_array($result);
	   $totalNotAttended = $Sub1Total[0] - $Sub1Attended[0];
	   //echo $totalNotAttended;
	 }
 	 
 	 if($count[0]>1)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub2."')");
	   $Sub2Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub2."')");
	   $Sub2Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub2."')");
	   $Sub2Attended = mysqli_fetch_array($result);
	   $totalNotAttended += $Sub2Total[0] - $Sub2Attended[0];
	  // echo $totalNotAttended;
 	 }
 	 
 	 if($count[0]>2)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub3."')");
	   $Sub3Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub3."')");
	   $Sub3Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub3."')");
	   $Sub3Attended = mysqli_fetch_array($result);
       $totalNotAttended += $Sub3Total[0] - $Sub3Attended[0]; 	 
 	 }
 	 
 	 if($count[0]>3)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub4."')");
	   $Sub4Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub4."')");
	   $Sub4Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub4."')");
	   $Sub4Attended = mysqli_fetch_array($result);
       $totalNotAttended += $Sub4Total[0] - $Sub4Attended[0]; 	 
 	 }
 	 
 	 if($count[0]>4)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub5."')");
	   $Sub5Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub5."')");
	   $Sub5Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub5."')");
	   $Sub5Attended = mysqli_fetch_array($result);
	   $totalNotAttended += $Sub5Total[0] - $Sub5Attended[0];
 	 }
 	 
 	 if($count[0]>5)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub6."')");
	   $Sub6Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub6."')");
	   $Sub6Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub6."')");
	   $Sub6Attended = mysqli_fetch_array($result);
	   $totalNotAttended += $Sub6Total[0] - $Sub6Attended[0];
 	 }
 	 
 	 if($count[0]>6)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub7."')");
	   $Sub7Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub7."')");
	   $Sub7Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub7."')");
	   $Sub7Attended = mysqli_fetch_array($result);
	   $totalNotAttended += $Sub7Total[0] - $Sub7Attended[0];
 	 }
 	 
 	 if($count[0]>7)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub8."')");
	   $Sub8Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub8."')");
	   $Sub8Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub8."')");
	   $Sub8Attended = mysqli_fetch_array($result);
	   $totalNotAttended += $Sub8Total[0] - $Sub8Attended[0];
 	 }
 	 
 	 if($count[0]>8)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub9."')");
	   $Sub9Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub9."')");
	   $Sub9Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub9."')");
	   $Sub9Attended = mysqli_fetch_array($result);
	   $totalNotAttended += $Sub9Total[0] - $Sub9Attended[0];
 	 }
 	 
 	 if($count[0]>9)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub10."')");
	   $Sub10Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub10."')");
	   $Sub10Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub10."')");
	   $Sub10Attended = mysqli_fetch_array($result);
	   $totalNotAttended += $Sub10Total[0] - $Sub10Attended[0];
 	 }
 	 
	 mysqli_close($db); 
?>
</head>
<body>

<h1>PIE CHART</h1>
<?php
//echo "['".$Sub1."',".$Sub1Attended[0]."],";
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Subject', 'Attendance'],
  <?php
    if($count[0]>0)
    echo "['".$Sub1."',".$Sub1Attended[0]."],";
    if($count[0]>1)
    echo "['".$Sub2."',".$Sub2Attended[0]."],";
    if($count[0]>2)
    echo "['".$Sub3."',".$Sub3Attended[0]."],";
    if($count[0]>3)
    echo "['".$Sub4."',".$Sub4Attended[0]."],";
    if($count[0]>4)
    echo "['".$Sub5."',".$Sub5Attended[0]."],";
    if($count[0]>5)
    echo "['".$Sub6."',".$Sub6Attended[0]."],";
    if($count[0]>6)
    echo "['".$Sub7."',".$Sub7Attended[0]."],";
    if($count[0]>7)
    echo "['".$Sub8."',".$Sub8Attended[0]."],";
    if($count[0]>8)
    echo "['".$Sub9."',".$Sub9Attended[0]."],";
    if($count[0]>9)
    echo "['".$Sub10."',".$Sub10Attended[0]."],";
    echo "['Not Attended',".$totalNotAttended."]";   
  ?>
]);
 
 // Optional; add a title and set the width and height of the chart
  var options = {'title':'Overall Attendance Percentage', 'width':600, 'height':500 , 'pieStartAngle':0};//You can use 'pieHole':0.1 for Donut Chart

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

<h2 style="text-align:center;text-color:darkblue">
	ATTENDANCE OVERVIEW
	</h2>
	
	<table class="blueTable">
		<thead>
		<tr>
		<th>Subjects</th>
		<th>Current Attendance</th>
		<th>Suggestions</th>
		</tr>
		</thead>
		
		<tbody>
	<?php	
	function message($Att,$percentCriteria)
	{
	 
	 if($Att <= ($percentCriteria-30))
	 $msg='<label style="color:red;">Critical.</label>';
	 
	 else if($Att <= ($percentCriteria-15))
	 $msg='<label style="color:orange;">Attention Required.</label>';
	 
	 else
	 $msg='<label style="color:green;">Good.</label>';
	 
	 return $msg;
	}
		
	if($count[0]>0)	
	echo'
		 <tr>
		 <td>'.$Sub1.'</td>
		 <td>'.$Sub1Att[0].'</td>
		 <td>'.message($Sub1Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>1)	
	echo'
		 <tr>
		 <td>'.$Sub2.'</td>
		 <td>'.$Sub2Att[0].'</td>
		 <td>'.message($Sub2Att[0],$percentCriteria[0]).'</td>
		 </tr>';	 
		 
	if($count[0]>2)	
	echo'
		 <tr>
		 <td>'.$Sub3.'</td>
		 <td>'.$Sub3Att[0].'</td>
		 <td>'.message($Sub3Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>3)	
	echo'
		 <tr>
		 <td>'.$Sub4.'</td>
		 <td>'.$Sub4Att[0].'</td>
		 <td>'.message($Sub4Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>4)	
	echo'
		 <tr>
		 <td>'.$Sub5.'</td>
		 <td>'.$Sub5Att[0].'</td>
		 <td>'.message($Sub5Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>5)	
	echo'
		 <tr>
		 <td>'.$Sub6.'</td>
		 <td>'.$Sub6Att[0].'</td>
		 <td>'.message($Sub6Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>6)	
	echo'
		 <tr>
		 <td>'.$Sub7.'</td>
		 <td>'.$Sub7Att[0].'</td>
		 <td>'.message($Sub7Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>7)	
	echo'
		 <tr>
		 <td>'.$Sub8.'</td>
		 <td>'.$Sub8Att[0].'</td>
		 <td>'.message($Sub8Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>8)	
	echo'
		 <tr>
		 <td>'.$Sub9.'</td>
		 <td>'.$Sub9Att[0].'</td>
		 <td>'.message($Sub9Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	if($count[0]>9)	
	echo'
		 <tr>
		 <td>'.$Sub10.'</td>
		 <td>'.$Sub10Att[0].'</td>
		 <td>'.message($Sub10Att[0],$percentCriteria[0]).'</td>
		 </tr>';
		 
	 ?>
		 	 	 	 	 
		 </tbody>
		 </table>
		 <br><br>
<div id="piechart"></div>
	
</body>
</html>

