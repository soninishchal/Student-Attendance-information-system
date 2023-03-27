
  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  <!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>
	
	<!-- Table css -->
  <link href="CSS/css/table.css" rel="stylesheet">

   <!-- Login form css -->
  <link href="CSS/css/loginForm.css" rel="stylesheet">

  <link href="CSS/css/w3css.css" rel="stylesheet">


<style type="text/css">

	button{
		border: none;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	div.main_div{
		margin-top: 100px;
	}
	p#p01{
		border: 5px dashed black;
		height: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	div.main_div{
		top: 3%;
	}
	h3{
		background: #4CAF50;
		height: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: white;
		top:0;
		position: absolute;
		width: 100%;
		margin: auto;
	}
	div.login_btn{
		display: flex;
		align-items: center;
		justify-content: center;
		color: white;
	}
</style>
</head>
<body>

<?php

//session variable starting
if (!isset($_SESSION)) {
	session_start();
}

if (isset($_SESSION['username']) && (isset($_SESSION['course']) || isset($_GET['course'])))
{
	
?>
	<header>
		<div id="logo-section">
		
			<p><h1>Attendance Section</h1></p>

		</div>
		<div id="headpara-section">

			<p><?php echo "Student Attendance & Information System"; ?></p>

		</div>
	</header>
	<div class="main_div">
		
<?php

	//attendance status - done or not done
	if (isset($_GET['attendance_status'])) {
		echo "<br/><br/><p id='p01'>".$_GET['attendance_status']."</p><br/><br/>";
	}

	//session variable starting
	if (!isset($_SESSION)) {
		session_start();
	}

	$_SESSION['page'] = 'attendance_homepage.php';

	//Printing particular course name
	if (isset($_GET['course'])) 
	$_SESSION['course'] = $_GET['course'];

	if (isset($_SESSION['course']) || isset($_GET['course']))
	{

	echo "<br><h3>".$_SESSION['course']." Class"."</h3><br/><br/>";
		
	}

	//login button
	?>

	<div class="login_btn"><button onclick="document.getElementById('id01').style.display='block'; return false; " style="width:auto;" class="btn btn-primary btn-xl js-scroll-trigger">Student Login</button></div>

	<?php

	//setting timezone to india
	date_default_timezone_set('Asia/Kolkata');

	//Particular course table
	$course_attendance = $_SESSION['course'] . "_attendance";
	$course_students = $_SESSION['course'] . "_students";

	//establishing mysql connection from file
	include 'connectpage.php';

	//student info
	$sql_query1 = "Select * from `".$course_students."` where rollno IN (Select `rollno` from `".$course_attendance."` where date='".date("y-m-d h")."')";

	$q1 = mysqli_query($connect,$sql_query1) or die("Error in getting results from course table".mysqli_error($connect));

	//show attendance list when any one student registered attendance
	if (isset($_GET['attendance_status'])) 
	{
			
		echo "<br/><table id='students'><tr><th>Rollno</th> "." <th>Student Name</th> "." <th>Total Attendance</th></tr> ";

		//convert to array
		while($arr_q1 = mysqli_fetch_array($q1))
		{
			//total attendance of particular student
			$sql_query2 = "Select * from `".$course_attendance."` where `rollno`='".$arr_q1[0]."'";

			$result = mysqli_query($connect,$sql_query2) or die("error total attendance".mysqli_error($connect));

			$total_attendance = mysqli_num_rows($result);

			//student info
			echo "<br/><tr><td>".$arr_q1[0]."</td><td> ".$arr_q1[1]."</td><td> ".$total_attendance."</td></tr><br/>";

		}
		echo "</table>";
	}
	else{

	echo "<br/>No Students";
	//No entries for this time period


	}


	//submitted attendance of teacher and absent students
	echo "<br/><a href='login.php?attendance_status=Attendance registered'><button>Submit</button></a>";
	echo "</div>";

}
elseif (!(isset($_SESSION['course']) || isset($_GET['course']))) {
	
	header("Location:course.php?error=Please choose a course<br/>");


}
else
header("Location:index.php?error=you must login<br/>");

?>

<!-- Login Form -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" name="login_form" method="post" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="CSS/img/User.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="input-box1" value='<?php 
if(isset($_POST["submit-button1"]))
{
echo $uname;
}
?>' required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="input-box2" required>
      
      <button type="submit" name="submit-button1" >Login</button>

    </div>
    
  </form>
</div>

</body>
</html>



























