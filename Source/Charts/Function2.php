
<!DOCTYPE >
<html>
<head>
<meta charset="utf-8">
<title>MyAccount</title>
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
           
     if($count[0]>0)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub1."')");
	   $Sub1Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub1."')");
	   $Sub1Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub1."')");
	   $Sub1Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>1)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub2."')");
	   $Sub2Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub2."')");
	   $Sub2Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub2."')");
	   $Sub2Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>2)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub3."')");
	   $Sub3Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub3."')");
	   $Sub3Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub3."')");
	   $Sub3Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>3)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub4."')");
	   $Sub4Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub4."')");
	   $Sub4Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub4."')");
	   $Sub4Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>4)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub5."')");
	   $Sub5Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub5."')");
	   $Sub5Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub5."')");
	   $Sub5Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>5)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub6."')");
	   $Sub6Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub6."')");
	   $Sub6Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub6."')");
	   $Sub6Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>6)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub7."')");
	   $Sub7Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub7."')");
	   $Sub7Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub7."')");
	   $Sub7Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>7)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub8."')");
	   $Sub8Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub8."')");
	   $Sub8Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub8."')");
	   $Sub8Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>8)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub9."')");
	   $Sub9Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub9."')");
	   $Sub9Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub9."')");
	   $Sub9Attended = mysqli_fetch_array($result);
 	 }
 	 
 	 if($count[0]>9)
 	 {
 	   $result = mysqli_query($db,"SELECT CalculateAttendance('".$LoggedInStudentID[0]."','".$Sub10."')");
	   $Sub10Att = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT TotalSessions('".$LoggedInStudentID[0]."','".$Sub10."')");
	   $Sub10Total = mysqli_fetch_array($result);
	   $result = mysqli_query($db,"SELECT AttendedSessions('".$LoggedInStudentID[0]."','".$Sub10."')");
	   $Sub10Attended = mysqli_fetch_array($result);
 	 }
 	 
	 mysqli_close($db); 
?>


<body>

	
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
		
	if($count[0]>0)	
	echo'
		 <tr>
		 <td>'.$Sub1.'</td>
		 <td>'.$Sub1Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>1)	
	echo'
		 <tr>
		 <td>'.$Sub2.'</td>
		 <td>'.$Sub2Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';	 
		 
	if($count[0]>2)	
	echo'
		 <tr>
		 <td>'.$Sub3.'</td>
		 <td>'.$Sub3Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>3)	
	echo'
		 <tr>
		 <td>'.$Sub4.'</td>
		 <td>'.$Sub4Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>4)	
	echo'
		 <tr>
		 <td>'.$Sub5.'</td>
		 <td>'.$Sub5Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>5)	
	echo'
		 <tr>
		 <td>'.$Sub6.'</td>
		 <td>'.$Sub6Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>6)	
	echo'
		 <tr>
		 <td>'.$Sub7.'</td>
		 <td>'.$Sub7Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>7)	
	echo'
		 <tr>
		 <td>'.$Sub8.'</td>
		 <td>'.$Sub8Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>8)	
	echo'
		 <tr>
		 <td>'.$Sub9.'</td>
		 <td>'.$Sub9Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	if($count[0]>9)	
	echo'
		 <tr>
		 <td>'.$Sub10.'</td>
		 <td>'.$Sub10Att[0].'</td>
		 <td>cell3_1</td>
		 </tr>';
		 
	 	 	 	 	 
		 
		?>
		 	 	 	 	 
		 </tbody>
		 </table>
	
	
</body>

</html>		
				
			
