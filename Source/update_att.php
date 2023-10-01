<!DOCTYPE >
<html>
<head>
<meta charset="utf-8">
<title>Timetable</title>

<link rel="stylesheet" href="updateatt_style.css">
</title>

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
     
     //$result = mysqli_query($db,"SELECT count(*) from Subject_Master where StudentID='".$LoggedInStudentID[0]."'");
	 //$count = mysqli_fetch_array($result);
	
	 //echo $count[0];
	 //echo $First[0];
     //echo $Last[0];
     //echo $LoggedInStudentID[0];
     //echo $Username[0];
	 
	 mysqli_close($db);
?>

</head>

<body>
<ul class="navbar">
  <li class="flt"><a class=active href="userhome.php">Attendance</a></li>
  <li class="flt"><a href="report.php">Attendance Report</a></li>
  <li class="flt"><a href="">To Do List</a></li>
  <li class="flt" ><a href="login.php">Sign Out</a></li>
</ul>

<div class="signupbox">

	<h2> Update Your Attendance Here</h2>

	<br><hr><hr><br>
	<form method="post" style="text-align:center" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		
	<h3>DATE TO BE UPDATED</h3>
	<br><br>
	
	<select name="year">
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
	</select>      

	<select name="month">
      <option value="01">JAN</option>
      <option value="02">FEB</option>
      <option value="03">MAR</option>
      <option value="04">APR</option>
      <option value="05">MAY</option>
      <option value="06">JUN</option>
      <option value="07">JUL</option>
      <option value="08">AUG</option>
      <option value="09">SEPT</option>
      <option value="10">OCT</option>
      <option value="11">NOV</option>
      <option value="12">DEC</option>
</select>

	  <select name="date">
      <option value="01">1</option>
      <option value="02">2</option>
      <option value="03">3</option>
      <option value="04">4</option>
      <option value="05">5</option>
      <option value="06">6</option>
      <option value="07">7</option>
      <option value="08">8</option>
      <option value="09">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
</select>
<br><br>
<input type="submit" name="DayOfWeek" value="Find Day">

<?php

if(isset($_POST['DayOfWeek']))
{
   //echo "HI";
   $year=$_POST['year'];
   //echo $year;
   $month=$_POST['month'];
   //echo $month;
   $date=$_POST['date'];
   //echo $date;
   $ttDate=$year.'-'.$month.'-'.$date;
   //echo $ttDate;
   
     $db = mysqli_connect('localhost','root','root','SMS')
	 or die('Error connecting to MySQL server.');
	 
	 $result = mysqli_query($db,"SELECT DAYNAME('".$ttDate."')");
	 $DayName=mysqli_fetch_array($result);
	 //echo $DayName[0];
	 
	 if($DayName[0] == 'Monday')
	   $Col = "MON";
	 
	 else if($DayName[0] == 'Tuesday')
	   $Col = "TUES";
	 
	 else if($DayName[0] == 'Wednesday')
	   $Col = "WED";
	   
	 else if($DayName[0] == 'Thursday')
	   $Col = "THURS";
	   
	 else if($DayName[0] == 'Friday')
	   $Col = "FRI";
	 
	 else if($DayName[0] == 'Saturday')
	   $Col = "SAT";
	   
	 else
	   $Col = "SUN";
	   
	   //echo $Col;  
	   
	 //Getting Subjects
     $Sub1 = $Sub2 = $Sub3 = $Sub4 = $Sub5 = $Sub6 = $Sub7 = $Sub8 = $Sub9 = $Sub10 = "";
     $i = 1;
     $count = 0;
     $result = mysqli_query($db,"SELECT SubjectName from TimeTable_Master where StudentID='".$LoggedInStudentID[0]."' and ".$Col." = 'Y'");
	 while($row=mysqli_fetch_array($result))
	 {
	 	  if($i == 1)
		  {
			$Sub1 = $row['SubjectName'];
			//echo $Sub1.'<br>';
			
		  }
		  
		  if($i == 2)
		  {
			$Sub2 = $row['SubjectName'];
			//echo $Sub2;
		  }
		  
		  if($i == 3)
		  {
			$Sub3 = $row['SubjectName'];
			//echo $Sub3.'<br>';
		  }
		  
		  if($i == 4)
		  {
			$Sub4 = $row['SubjectName'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 5)
		  {
			$Sub5 = $row['SubjectName'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 6)
		  {
			$Sub6 = $row['SubjectName'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 7)
		  {
			$Sub7 = $row['Subject_Name'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 8)
		  {
			$Sub8 = $row['SubjectName'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 9)
		  {
			$Sub9 = $row['SubjectName'];
			//echo $Sub1.'<br>';
		  }
		  
		  if($i == 10)
		  {
			$Sub10 = $row['SubjectName'];
			//echo $Sub1.'<br>';
		  }
		    
		  $i++;
		  $count++;
	 }
    
	 //echo $count;
	 $Query1 = ("CREATE TABLE Dummy(count int,ttDate date,Sub1 varchar(25),Sub2 varchar(25),Sub3 varchar(25),Sub4 varchar(25),Sub5 varchar(25),Sub6 varchar(25),Sub7 varchar(25),Sub8 varchar(25),Sub9 varchar(25),Sub10 varchar(25))");
     mysqli_query($db,$Query1);
	 $Query2 = ("INSERT into Dummy values('".$count."','".$ttDate."','".$Sub1."','".$Sub2."','".$Sub3."','".$Sub4."','".$Sub5."','".$Sub6."','".$Sub7."','".$Sub8."','".$Sub9."','".$Sub10."')");
     mysqli_query($db,$Query2);
	 
	 
	 mysqli_close($db);
   
}
 
?>		

<br><br><hr><hr><br>

<?php

echo '<h3> Timetable on '.$DayName[0].' </h3> ';

?>

<table id="one-column-emphasis" style="text-align:center" >
			
			
			<thead>
				<tr>
					<th scope="col">Subject Name</th>
				    <th scope="col">Present</th>
				    <th scope="col">Absent</th>
				    <th scope="col">Lecture Off</th>
				    
		    	</tr>
			</thead>
			
			<tbody>
			
			<?php
			if($count > 0)
			echo '<tr>
					<td>'.$Sub1.'</td>
				    <td><input type="radio" name="Sub1" value="P"></td>
				    <td><input type="radio" name="Sub1" value="A"></td>
				    <td><input type="radio" name="Sub1" value="O"></td>
		    	</tr>';
		    	
		    if($count > 1)	
		    echo'<tr>
		    		<td>'.$Sub2.'</td>
		    		<td><input type="radio" name="Sub2" value="P"></td>
				    <td><input type="radio" name="Sub2" value="A"></td>
				    <td><input type="radio" name="Sub3" value="O"></td>
		    	</tr>';
		    	
		    if($count > 2)	
		    echo'<tr>
		    		<td>'.$Sub3.'</td>	
		    		<td><input type="radio" name="Sub3" value="P"></td>
				    <td><input type="radio" name="Sub3" value="A"></td>
				    <td><input type="radio" name="Sub3" value="O"></td>
		    	</tr>';
		    	
		    if($count > 3)		
		    	echo '<tr>
		    		<td>'.$Sub4.'</td>
		    		<td><input type="radio" name="Sub4" value="P"></td>
				    <td><input type="radio" name="Sub4" value="A"></td>
				    <td><input type="radio" name="Sub4" value="O"></td>
		    	</tr>';
		    	
		    if($count > 4)		
		    	echo '<tr>
		    		<td>'.$Sub5.'</td>
		    		<td><input type="radio" name="Sub5" value="P"></td>
				    <td><input type="radio" name="Sub5" value="A"></td>
				    <td><input type="radio" name="Sub5" value="O"></td>
		    	</tr>';
		    	
		    if($count > 5)		
		    	echo '<tr>
		    		<td>'.$Sub6.'</td>
		    		<td><input type="radio" name="Sub6" value="P"></td>
				    <td><input type="radio" name="Sub6" value="A"></td>
				    <td><input type="radio" name="Sub6" value="0"></td>
		    	</tr>';
		    	
		    if($count > 6)		
		    	echo '<tr>
		    		<td>'.$Sub7.'</td>
		    		<td><input type="radio" name="Sub7" value="P"></td>
				    <td><input type="radio" name="Sub7" value="A"></td>
				    <td><input type="radio" name="Sub1" value="O"></td>
		    	</tr>';
		    	
		    if($count > 7)		
		    	echo '<tr>
		    		<td>'.$Sub8.'</td>
		    		<td><input type="radio" name="Sub8" value="P"></td>
				    <td><input type="radio" name="Sub8" value="A"></td>
				    <td><input type="radio" name="Sub8" value="O"></td>
		    	</tr>';
		    	
		    if($count > 8)	
		    	echo '<tr>
		    		<td>'.$Sub9.'</td>
		    		<td><input type="radio" name="Sub9" value="P"></td>
				    <td><input type="radio" name="Sub9" value="A"></td>
				    <td><input type="radio" name="Sub9" value="O"></td>
		    	</tr>';
		    	
		    if($count > 9)		
		    	echo '<tr>
		    		<td>'.$Sub10.'</td>
		    		<td><input type="radio" name="Sub10" value="P"></td>
				    <td><input type="radio" name="Sub10" value="A"></td>
				    <td><input type="radio" name="Sub10" value="O"></td>
		    	</tr>';
		    	
		?>   	
			</tbody>
		</table>
		
		<br><hr><hr><br>
		
		<input type="submit" name="Updated" value="Done">
		
		<br><hr><hr><br>
		</form>
	
</div>
 
<?php
if(isset($_POST['Updated']))
{   
	 $db = mysqli_connect('localhost','root','root','SMS')
	 or die('Error connecting to MySQL server.');
	 
	 
	 $count = 0;
	 $tt_Date = $Sub1 = $Sub2 = $Sub3 = $Sub4 = $Sub5 = $Sub6 = $Sub7 = $Sub8 = $Sub9 = $Sub10 = "";
	 
	 $result = mysqli_query($db,"Select * from Dummy");
	 $row = mysqli_fetch_array($result);
	 $count = $row['count'];
	 $ttDate = $row['ttDate'];
	 $Sub1 = $row['Sub1'];
	 $Sub2 = $row['Sub2'];
	 $Sub3 = $row['Sub3'];
	 $Sub4 = $row['Sub4'];
	 $Sub5 = $row['Sub5'];
	 $Sub6 = $row['Sub6'];
	 $Sub7 = $row['Sub7'];
	 $Sub8 = $row['Sub8'];
	 $Sub9 = $row['Sub9'];
	 $Sub10 = $row['Sub10'];
	 
	 //echo $_POST['Sub1'];
	 //echo $LoggedInStudentID[0];
	 //echo $count;
	 //echo $ttDate;
	 //echo $Sub1;
	 //echo $Sub2;
	 //echo $Sub3;
	 //echo $Sub4;
	 //echo $Sub5;
	 //echo $Sub6;
	 //echo $Sub7;
	 //echo $Sub8;
	 //echo $Sub9;
	 //echo $Sub10;
	 
	 $Query3 = ("DROP TABLE Dummy");
     mysqli_query($db,$Query3);
	 
	 if($_POST['Sub1'] != "O" && $count>0)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub1."','".$ttDate."','".$_POST['Sub1']."')");
		mysqli_query($db,$insertQuery);   
	 }
	 
	 if($_POST['Sub2'] != "O" && $count>1)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub2."','".$ttDate."','".$_POST['Sub2']."')");
		mysqli_query($db,$insertQuery);   
	 }
     
     if($_POST['Sub3'] != "O" && $count>2)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub3."','".$ttDate."','".$_POST['Sub3']."')");
		mysqli_query($db,$insertQuery);   
	 }
	 
	 if($_POST['Sub4'] != "O" && $count>3)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub4."','".$ttDate."','".$_POST['Sub4']."')");
		mysqli_query($db,$insertQuery);   
	 }

	 if($_POST['Sub5'] != "O" && $count>4)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub5."','".$ttDate."','".$_POST['Sub5']."')");
		mysqli_query($db,$insertQuery);   
	 }

	 if($_POST['Sub6'] != "O" && $count>5)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub6."','".$ttDate."','".$_POST['Sub6']."')");
		mysqli_query($db,$insertQuery);   
	 }

	 if($_POST['Sub7'] != "O" && $count>6)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub7."','".$ttDate."','".$_POST['Sub7']."')");
		mysqli_query($db,$insertQuery);   
	 }

	 if($_POST['Sub8'] != "O" && $count>7)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub8."','".$ttDate."','".$_POST['Sub8']."')");
		mysqli_query($db,$insertQuery);   
	 }
     
     if($_POST['Sub9'] != "O" && $count>8)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub9."','".$ttDate."','".$_POST['Sub9']."')");
		mysqli_query($db,$insertQuery);   
	 }

     if($_POST['Sub10'] != "O" && $count>9)
	 {
       	$insertQuery = ("INSERT INTO Attendance_Transaction(StudentID,SubjectName,Date,Present) VALUES('".$LoggedInStudentID[0]."','".$Sub10."','".$ttDate."','".$_POST['Sub10']."')");
		mysqli_query($db,$insertQuery);   
	 }

	 mysqli_close($db);
	 header("location:userhome.php");
} 
?>		

</body>
</html>
