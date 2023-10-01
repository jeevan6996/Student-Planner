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
  <li class="flt"><a href="TODO/ToDoList.php">To Do List</a></li>
  <li class="flt" ><a href="login.php">Sign Out</a></li>
</ul>
 
 
	<div class="signupbox" style="text-align:center">
		
	
	<form id="todo">
		
		<hr>
		<h3>Add New Tasks</h3>
		<input id="test" type="text"  ><br>
		<input value="add" type="button"  onClick="add()"><br>
		<hr>
		<br>
		<div id="container" style="width:550px;margin-left:20%;">	
		<h3>Your Tasks</h3>
		</div>
		<br>
		<hr>
    <input type="submit" value="Save" name="Submit">
    </form>
	    
	
	
	<script>
		
		var i=0;
		var j=0 , k=0 , l=0;
		function add(){    
			if (document.getElementById('test').value!='') 
			{   
				i++; //cnt of tasks
				j++;
				k++;
				l++; 
				var title = document.getElementById('test').value;
				
				var chk = document.createElement('checkbox');
				chk.innerHTML = '<input type="checkbox" id="check' + i + '" name="check' + i + '" value="1">&nbsp';       
								
				var lab = document.createElement('label');        
				lab.innerHTML = '<label id="label' + i + '" name="label' + i + '">'+ title +'</label> &nbsp';       
				
				var but = document.createElement('submit');        
				but.innerHTML = '<input type="submit" name="del' + i + '" value="Delete" ><br>';
				
				/*
				 var ch1 = document.createElement('radio');        
				 ch1.innerHTML = '<input type="radio" id="check' + j + '" name="check' + j + ' value="D">Done ';       
				
				 var ch2 = document.createElement('radio');        
				 ch2.innerHTML = '<input type="radio" id="check' + k + '" name="check' + j + ' value="P">Pending ';       
				
				 var ch3 = document.createElement('radio');        
				 ch3.innerHTML = '<input type="radio" id="check' + l + '" name="check' + j + ' value="R">Remove <br>';       
				*/
				document.getElementById('container').appendChild(chk); 
				document.getElementById('container').appendChild(lab); 
				document.getElementById('container').appendChild(but); 
				
				//document.getElementById('container').appendChild(ch1);
				//document.getElementById('container').appendChild(ch2);
				//document.getElementById('container').appendChild(ch3);            
			}
		}
		</script>
    
    
	<hr>
	
	</div>
	
    <script  src="js/index.js"></script>

</body>
</html>
