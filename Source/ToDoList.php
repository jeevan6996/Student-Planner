<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TO-DO list</title>
  
      <link rel="stylesheet" href="todo_style.css">
  
</head>	

<body>
 
 <ul class="navbar">
  <li class="flt"><a class=active href="userhome.php">Attendance</a></li>
  <li class="flt"><a href="report.php">Attendance Report</a></li>
  <li class="flt"><a href="ToDoList.php">To Do List</a></li>
  <li class="flt"><a href="reminder_setup.php">Reminders</a></li>
  <li class="flt" ><a href="login.php">Sign Out</a></li>
</ul>

 
  
	<div class="signupbox" style="text-align:center">
		
	
	<form id="todo" method="post">
		<hr>
		<h3>Add New Tasks</h3>
		<input id="test" type="text"> &nbsp
		<input value="Add" type="button"  onClick="add()"><br>
		<hr>
		<br>
		<div style="width:550px;margin-left:20%;">	
		<h3>Your To-do List</h3>
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
			 
			 $result = mysqli_query($db,"SELECT count(*) from ToDoList_Transaction where StudentID='".$LoggedInStudentID[0]."'");
			 $count = mysqli_fetch_array($result);
			 
			 if($count[0]==0)
			 echo "<br>No entries.<br>";
			 
			 else
			 {
			  $result = mysqli_query($db,"SELECT count(*) from ToDoList_Transaction where StudentID='".$LoggedInStudentID[0]."'");
			  $rowCnt = mysqli_fetch_array($result);
			  $result = mysqli_query($db,"SELECT * from ToDoList_Transaction where StudentID='".$LoggedInStudentID[0]."'");
			  /*echo '<ol>';   
			     while($row=mysqli_fetch_array($result))
	 			{
	 			  echo '<li>'.$row['ListItem'].'<br></li>';
	 			}
	 		  	echo '</ol><hr>';*/
	 		   $cntList = 1;
	 		   echo '<ol>';
	 		   while($row=mysqli_fetch_array($result))
	 		   {
	 		     if($row['Status']==0)
	 		     echo '<li><input type="checkbox" id="checkd'.$cntList.'" name="checkd'.$cntList.'" value="1">'.$row['ListItem'].' &nbsp &nbsp &nbsp ';
		 		 else
				 echo '<li><input type="checkbox" id="checkd'.$cntList.'" name="checkd'.$cntList.'" value="1" checked><strike>'.$row['ListItem'].'</strike> &nbsp &nbsp &nbsp ';	 		 
	 		     echo '<input type="hidden" name="inputd'.$cntList.'" value="'.$row['ListItem'].'">';
	 		     echo '<input type="submit" name="deld'.$cntList.'" value="Delete"></li><br>';
	 		     
	 		     $cntList+=1;
	 		   }	
	 		   echo '</ol>';
			 }
			 mysqli_close($db);
		?>
		<input type="hidden" id="cnt" name="countList" value="0">
		<br>
		</div>
		<hr>
		<div id="container" style="width:550px;margin-left:20%;">	
		     <h3>Adding To-do List</h3>
		</div>
		<br>
		<hr>
    <input type="submit" value="Save" name="Submit" onClick="refresh()">
    <input value="Reset" type="button"  onClick="reload()">
    
    </form>
	    
	
	
	<script>
		var i=0;
		function add()
		{    
			if (document.getElementById('test').value != '') 
			{   
				i++; //cnt of tasks
				var title = document.getElementById('test').value;
				
				var chk = document.createElement('checkbox');
				chk.innerHTML = '<input type="checkbox" id="check' + i + '" name="check' + i + '" value="1"> &nbsp';       
								
				var lab = document.createElement('label');        
				lab.innerHTML = '<label id="label' + i + '" name="label' + i + '">'+ title +'</label> &nbsp&nbsp&nbsp';       
				
				var inp = document.createElement('input');        
				inp.innerHTML = '<input name="input' + i +'" value="'+ title +'">';       
				inp.setAttribute("type", "hidden");				
				
				var but = document.createElement('submit');        
				but.innerHTML = '<input type="submit" name="del' + i + '" value="Delete"><br>';
				
				document.getElementById('container').appendChild(chk); 
				document.getElementById('container').appendChild(lab);
				document.getElementById('container').appendChild(but); 
				document.getElementById('container').appendChild(inp); 
				
				document.getElementById('cnt').value=i;
				document.getElementById('test').value='';
			}
		}
		
		function reload()
		{
		  document.getElementById('test').value='';
		  location.reload();
		}
		
		function refresh()
		{
		}
		
		function remove()
		{
		  <?php
		    echo "HI";
		  ?>
		}
	</script>
    
    <?php 
          //SAVING NEW TASKS **
		  if(isset($_POST["Submit"]))
	      {
	    
		     $db = mysqli_connect('localhost','root','root','SMS')
		     or die('Error connecting to MySQL server.');
	 		 
			 //$result = mysqli_query($db,"SELECT count(*) from ToDoList_Transaction where StudentID='".$LoggedInStudentID[0]."'");
			 //$count = mysqli_fetch_array($result);
			 
			 //echo $_POST['countList'];
			 //echo $_POST['input1'].''.$_POST['check1'];
			 //echo $_POST['input2'];
			 //echo $_POST['input3'];
			 $cnt = 1;
			 while($cnt <= $_POST['countList'])
			 {
			   $inpName='input';
			   $inpName.=$cnt;
			   $chkName='check';
			   $chkName.=$cnt;
			   
			   $result = mysqli_query($db,"SELECT CURDATE()");
			   $rowCurDate=mysqli_fetch_array($result);
			   
			   //echo $rowCurDate[0];
			   //echo $_POST[$inpName];
			   
			   $task = $_POST[$inpName];
			   
			   //echo $task;
			   
			   $status = 0;
			   if($_POST[$chkName] == 1)
			   $status=1;
			   
			   $insertQuery = ("INSERT INTO ToDoList_Transaction(StudentID,ListItem,Status,CreatedDate) VALUES('".$LoggedInStudentID[0]."','".$task."','".$status."','".$rowCurDate[0]."')");
		   	   mysqli_query($db,$insertQuery);
			   
			   $cnt+=1;
			 }
			 
			 mysqli_close($db);
			 header("location:ToDoList.php");
          }
          
         //MAKING DELETIONS **
           
		 $db = mysqli_connect('localhost','root','root','SMS')
		 or die('Error connecting to MySQL server.');
	 	 
	 	 $result = mysqli_query($db,"SELECT count(*) from ToDoList_Transaction where StudentID='".$LoggedInStudentID[0]."'");
		 $rowCnt = mysqli_fetch_array($result);
			  
	 	 $cnt = 1;
	 	 $flag = 0; 
		 while($cnt <= $rowCnt[0])
		 {
		   $delName='deld';
		   $delName.=$cnt;
		   //$chkName='checkd';
		   //$chkName.=$cnt;
		   $inpName='inputd';
		   $inpName.=$cnt;
		   //echo "hi";
		   
		   if(isset($_POST[$delName]))
		   {
		   	$flag = 1;
		   	$task = $_POST[$inpName];
		    echo $task;
		     
		    $insertQuery = ("delete from ToDoList_Transaction WHERE StudentID = '".$LoggedInStudentID[0]."' and ListItem = '".$task."'");
		  	mysqli_query($db,$insertQuery);
		    header("location:ToDoList.php");
  		   }
             		   
		   $cnt+=1;
		 }
		 
		 if($flag == 1)
		 header("location:ToDoList.php");
		 mysqli_close($db);
		 
		 //MAKING UPDATES **			 
		 
		 if(isset($_POST["Submit"]))
	     {
	    
		      $db = mysqli_connect('localhost','root','root','SMS')
		      or die('Error connecting to MySQL server.');
	 		 
	 		  $result = mysqli_query($db,"SELECT count(*) from ToDoList_Transaction where StudentID='".$LoggedInStudentID[0]."'");
		 	  $rowCnt = mysqli_fetch_array($result);
		
			  $cnt = 1;
			  while($cnt <= $rowCnt[0])
			  {
				   $delName='deld';
				   $delName.=$cnt;
				   $chkName='checkd';
				   $chkName.=$cnt;
				   $inpName='inputd';
				   $inpName.=$cnt;
				   //echo "hi";
				   
				   $task = $_POST[$inpName];
				   echo $task;
					 
				   $updateQuery = ("UPDATE ToDoList_Transaction SET Status = '".$_POST[$chkName]."' WHERE StudentID = '".$LoggedInStudentID[0]."' and ListItem = '".$task."'");
				   mysqli_query($db,$updateQuery);
				   header("location:ToDoList.php");
		  		  				     		   
				   $cnt+=1;
			  }
			 
			  mysqli_close($db);
			  header("location:ToDoList.php");
          }

    ?>

		      
	<hr>
	
	</div>

</body>
</html>
