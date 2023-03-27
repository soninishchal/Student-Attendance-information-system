
  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  
  <!--php code-->
<?php 

//setting timezone to india
date_default_timezone_set("Asia/Kolkata");

//error handle
if (isset($_GET['error'])) {
	echo "<font color='red'>".$_GET['error']."</font>";
}

//teacher submitted attendance
if (isset($_GET['attendance_status'])) {
	
	echo $_GET['attendance_status'];

	//db connection
	include 'connectpage.php';

	//session variable starting
	if (!isset($_SESSION)) {
		session_start();
	}

	//registring teacher attendance
	$sql_q1 = "insert into teacher_attendance values('".date('y-m-d h:00:00')."','".$_SESSION['username']."')";
	$q1 = mysqli_query($connect,$sql_q1) or die("teacher attendance registring failed");

	if($q1 == true)
	{
		echo "<script>
		alert('Attendance registered');
		window.location = 'logout.php';
		</script>";
	}
}

//receiving values from the form
if(isset($_POST["submit-button1"]))
 {
	$uname=$_POST["input-box1"];
	$password=$_POST["input-box2"];
	$flag = 1;

	//Mysql connection
	include_once "connectpage.php";
	
	$q1=mysqli_query($connect,"select * from users where username='$uname' ") or die("Login failed");

	$arr_q1=mysqli_fetch_array($q1);


	#check username 
	
	if($uname == "" || $uname != $arr_q1["username"])
	{
		$flag = 0;
		echo "
		<script>
		alert('username did not match...Please re-enter your username');
		window.history.back();
		</script>
		";
	}

	#check password 

	else if($password == "" || $password != $arr_q1["password"])
	{
		$flag = 0;
		echo "
		<script>
		alert('password did not match...Please re-enter your password');
		window.history.back();
		</script>
		";
	}

	//Username and password match
	if ($flag == 1) {
		
		//session variable starting
		if (!isset($_SESSION)) {
			session_start();
		}

		//student login for attendance after teacher
		if(isset($_SESSION['username']) && $_SESSION['username'] != $uname)
		{
			$_SESSION['student_login']= $uname;
			header('Location:attendance.php?course='.$_SESSION['course']);
			//echo "student attendance registered";
		}
		//first time login
		else
		{
			$_SESSION['username'] = $uname;

			//admin login 
			if($arr_q1['rollno'] == 'admin') 
			header("Location:admin.php");
			//teacher login
			else if ($arr_q1['rollno'] == 'teacher')
				header("Location:course.php");		
			//Student login
			else
			header("Location:student.php");
		}
		
	}

 }
?>