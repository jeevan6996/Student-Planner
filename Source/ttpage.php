<!DOCTYPE >
<html>
<head>
<?php
     //Logout All Previously Logged-in Users

	 $db = mysqli_connect('localhost','root','root','SMS')
	 or die('Error connecting to MySQL server.');
	 
	 $result = mysqli_query($db,"SELECT MAX(Student_ID) from Student_Master"); 
	 $maxID = mysqli_fetch_array($result);
	 //echo $maxID[0];
	 
	 $result = mysqli_query($db,"SELECT count(*) from Subject_Master where StudentID='".$maxID[0]."'");
	 $count = mysqli_fetch_array($result);
	 //echo $count[0];
	
     //Getting Subjects
     $Sub1 = $Sub2 = $Sub3 = $Sub4 = $Sub5 = $Sub6 = $Sub7 = $Sub8 = $Sub9 = $Sub10 = "";
     $i = 1;
     $result = mysqli_query($db,"SELECT Subject_Name from Subject_Master where StudentID='".$maxID[0]."'");
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
			//echo $Sub1.'<br>';
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
	 
	 mysqli_close($db);
?>
<meta charset="utf-8">
<title>Timetable</title>

<link rel="stylesheet" href="ttpage_style.css">
</title>

<body>
<div class="signupbox">
	<img src="logo.png" class="user">
	<h2 style = "text-align:center"><b>Time Table Details</b></h2>
	
	<br>
	<form method="post">
		<table id="one-column-emphasis">

<?php			
			echo '<thead>
				  <tr>
				  <th scope="col">&nbsp Subject</th>
				  <th scope="col">&nbsp Mon</th>
				  <th scope="col">&nbsp Tues</th>
				  <th scope="col">&nbsp Wed</th>
				  <th scope="col">&nbsp Thurs</th>
				  <th scope="col">&nbsp Fri</th>
				  <th scope="col">&nbsp Sat</th>
				  <th scope="col">&nbsp Sun</th>
				  </tr>
				  </thead>';
?>

			<tbody>
			<?php
				    if($count[0] > 0)
					echo '<tr><td>'.$Sub1.'</td>
				    <td><input type="checkbox" name="S1mon" value="Y"></td>
				    <td><input type="checkbox" name="S1tues" value="Y"></td>
				    <td><input type="checkbox" name="S1wed" value="Y"></td>
				    <td><input type="checkbox" name="S1thurs" value="Y"></td>
				    <td><input type="checkbox" name="S1fri" value="Y"></td>
				    <td><input type="checkbox" name="S1sat" value="Y"></td>
				    <td><input type="checkbox" name="S1sun" value="Y"></td>
		    		</tr>';
		    	
		    		if($count[0] > 1)
		    	    echo '<tr><td>'.$Sub2.'</td>
		    		<td><input type="checkbox" name="S2mon" value="Y"></td>
				    <td><input type="checkbox" name="S2tues" value="Y"></td>
				    <td><input type="checkbox" name="S2wed" value="Y"></td>
				    <td><input type="checkbox" name="S2thurs" value="Y"></td>
				    <td><input type="checkbox" name="S2fri" value="Y"></td>
				    <td><input type="checkbox" name="S2sat" value="Y"></td>
				    <td><input type="checkbox" name="S2sun" value="Y"></td>
		    	    </tr>';
					
					if($count[0] > 2)
					echo '<tr><td>'.$Sub3.'</td>
		    		<td><input type="checkbox" name="S3mon" value="Y"></td>
				    <td><input type="checkbox" name="S3tues" value="Y"></td>
				    <td><input type="checkbox" name="S3wed" value="Y"></td>
				    <td><input type="checkbox" name="S3thurs" value="Y"></td>
				    <td><input type="checkbox" name="S3fri" value="Y"></td>
				    <td><input type="checkbox" name="S3sat" value="Y"></td>
				    <td><input type="checkbox" name="S3sun" value="Y"></td>
		    		</tr>';

					if($count[0] > 3)
					echo '<tr><td>'.$Sub4.'</td>
		    		<td><input type="checkbox" name="S4mon" value="Y"></td>
				    <td><input type="checkbox" name="S4tues" value="Y"></td>
				    <td><input type="checkbox" name="S4wed" value="Y"></td>
				    <td><input type="checkbox" name="S4thurs" value="Y"></td>
				    <td><input type="checkbox" name="S4fri" value="Y"></td>
				    <td><input type="checkbox" name="S4sat" value="Y"></td>
				    <td><input type="checkbox" name="S4sun" value="Y"></td>
		    		</tr>';
					
					if($count[0] > 4)
					echo '<tr><td>'.$Sub5.'</td>
		    		<td><input type="checkbox" name="S5mon" value="Y"></td>
				    <td><input type="checkbox" name="S5tues" value="Y"></td>
				    <td><input type="checkbox" name="S5wed" value="Y"></td>
				    <td><input type="checkbox" name="S5thurs" value="Y"></td>
				    <td><input type="checkbox" name="S5fri" value="Y"></td>
				    <td><input type="checkbox" name="S5sat" value="Y"></td>
				    <td><input type="checkbox" name="S5sun" value="Y"></td>
		    		</tr>';

					if($count[0] > 5)
					echo '<tr><td>'.$Sub6.'</td>
		    		<td><input type="checkbox" name="S6mon" value="Y"></td>
				    <td><input type="checkbox" name="S6tues" value="Y"></td>
				    <td><input type="checkbox" name="S6wed" value="Y"></td>
				    <td><input type="checkbox" name="S6thurs" value="Y"></td>
				    <td><input type="checkbox" name="S6fri" value="Y"></td>
				    <td><input type="checkbox" name="S6sat" value="Y"></td>
				    <td><input type="checkbox" name="S6sun" value="Y"></td>
			    	</tr>';

					if($count[0] > 6)
					echo '<tr><td>'.$Sub7.'</td>
		    		<td><input type="checkbox" name="S7mon" value="Y"></td>
				    <td><input type="checkbox" name="S7tues" value="Y"></td>
				    <td><input type="checkbox" name="S7wed" value="Y"></td>
				    <td><input type="checkbox" name="S7thurs" value="Y"></td>
				    <td><input type="checkbox" name="S7fri" value="Y"></td>
				    <td><input type="checkbox" name="S7sat" value="Y"></td>
				    <td><input type="checkbox" name="S7sun" value="Y"></td>
		    		</tr>';

					if($count[0] > 7)
					echo '<tr><td>'.$Sub8.'</td>
		    		<td><input type="checkbox" name="S7mon" value="Y"></td>
				    <td><input type="checkbox" name="S7tues" value="Y"></td>
				    <td><input type="checkbox" name="S7wed" value="Y"></td>
				    <td><input type="checkbox" name="S7thurs" value="Y"></td>
				    <td><input type="checkbox" name="S7fri" value="Y"></td>
				    <td><input type="checkbox" name="S7sat" value="Y"></td>
				    <td><input type="checkbox" name="S7sun" value="Y"></td>
		    		</tr>';

					if($count[	0] > 8)
					echo '<tr><td>'.$Sub9.'</td>
		    		<td><input type="checkbox" name="S7mon" value="Y"></td>
				    <td><input type="checkbox" name="S7tues" value="Y"></td>
				    <td><input type="checkbox" name="S7wed" value="Y"></td>
				    <td><input type="checkbox" name="S7thurs" value="Y"></td>
				    <td><input type="checkbox" name="S7fri" value="Y"></td>
				    <td><input type="checkbox" name="S7sat" value="Y"></td>
				    <td><input type="checkbox" name="S7sun" value="Y"></td>
			    	</tr>';

					if($count[0] > 9)
					echo '<tr><td>'.$Sub10.'</td>
		    		<td><input type="checkbox" name="S7mon" value="Y"></td>
				    <td><input type="checkbox" name="S7tues" value="Y"></td>
				    <td><input type="checkbox" name="S7wed" value="Y"></td>
				    <td><input type="checkbox" name="S7thurs" value="Y"></td>
				    <td><input type="checkbox" name="S7fri" value="Y"></td>
				    <td><input type="checkbox" name="S7sat" value="Y"></td>
				    <td><input type="checkbox" name="S7sun" value="Y"></td>
		    		</tr>';
			?>
			</tbody>
		</table>
		<br><br>
		<input type="submit" name="Finish" value="Finish">
			<br>
		<input type="reset" name="Reset-All" value="Reset">

	</form>

		
	
</div>

<?php

	  if(isset($_POST['Finish']))
	  {
	  		$db = mysqli_connect('localhost','root','root','SMS')
	        or die('Error connecting to MySQL server.');
	        
			if($count[0] > 0)
		 	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S1mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S1tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S1wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S1thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S1fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S1sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S1sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub1."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		   	
		   	if($count[0] > 1)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S2mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S2tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S2wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S2thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S2fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S2sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S2sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub2."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		   	
		   	if($count[0] > 2)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S3mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S3tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S3wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S3thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S3fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S3sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S3sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub3."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		   	
		   	
		   	if($count[0] > 3)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S4mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S4tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S4wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S4thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S4fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S4sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S4sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub4."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		   	
		   	if($count[0] > 4)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S5mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S5tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S5wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S5thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S5fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S5sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S5sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub5."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		   	
		   	
		   	if($count[0] > 5)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S6mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S6tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S6wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S6thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S6fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S6sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S6sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub6."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		
			if($count[0] > 6)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S7mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S7tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S7wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S7thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S7fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S7sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S7sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub7."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		
		   	if($count[0] > 7)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S8mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S8tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S8wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S8thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S8fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S8sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S8sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub8."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
		   	
		   	if($count[0] > 8)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S9mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S9tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S9wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S9thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S9fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S9sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S9sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub9."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}
			
			if($count[0] > 9)
		   	{		
		   		$Mon = $Tues = $Wed = $Thurs = $Fri = $Sat = $Sun = 'N';
		   		
		   		if($_POST['S10mon'] == 'Y')
		   		$Mon = 'Y';
		   	
		   		if($_POST['S10tues'] == 'Y')
		   		$Tues = 'Y';
		   		
		   		if($_POST['S10wed'] == 'Y')
		   		$Wed = 'Y';
		   		
		   		if($_POST['S10thurs'] == 'Y')
		   		$Thurs = 'Y';
		   		
		   		if($_POST['S10fri'] == 'Y')
		   		$Fri = 'Y';
		   		
		   		if($_POST['S10sat'] == 'Y')
		   		$Sat = 'Y';
		   		
		   		if($_POST['S10sun'] == 'Y')
		   		$Sun = 'Y';
                
                //echo $maxID[0]." ".$Sub1." ".$Mon." ".$Tues." ".$Wed." ".$Thurs." ".$Fri." ".$Sat." ".$Sun;  		   		
		   		$insertQuery1 = ("INSERT INTO TimeTable_Master(StudentID,SubjectName,MON,TUES,WED,THURS,FRI,SAT,SUN) VALUES('".$maxID[0]."','".$Sub10."','".$Mon."','".$Tues."','".$Wed."','".$Thurs."','".$Fri."','".$Sat."','".$Sun."')");
		   		mysqli_query($db,$insertQuery1);
		   	}   	
		   	
		   	
	        mysqli_close($db);
 	  		header("location:login.php");
	  } 
	 
?>	 
</body>
</html>
