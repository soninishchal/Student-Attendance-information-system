
  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  <?php

//session variable starting
if (!isset($_SESSION)) {
	session_start();
}

//If student coming after login
if($_SESSION['student_login'])
{


	/** Mysql connection
	*/
	include_once "connectpage.php";

	echo "In the attendance <br/>";
	
	/** check login details
	*/
	$q0 = mysqli_query($connect,"select * from `course`") or die("error in getting all course name");
	
	while($q0_arr = mysqli_fetch_array($q0))
	{
		//creating variable for course_students
		$course_students = $q0_arr['course']."_students";

		
		if ($_SESSION['course'] == $q0_arr['course'])
		{

			$q1 = mysqli_query($connect,"select rollno,mobile_no from `".$course_students."` where `username` = '".$_SESSION['student_login']."'") or die("Student information selection failed");
			
			$_GET['course_attendance'] = $_SESSION['course']."_attendance";
			echo $_GET["course_attendance"];

		}
	}
	$q1 = mysqli_fetch_array($q1);

	//Not a student of choosen course
	if($q1 == false)
	{
		echo header("Location:attendance_homepage.php?attendance_status=You are not a student of ".$_SESSION['course']."&course=".$_SESSION['course']);
	}
	//Setting current timezone
	date_default_timezone_set("Asia/Kolkata");
			
	//course right choosen by student
	if ($q1[0] != "") 
		{
		//check today's entry if already registered
		$checkPreviousEntry = mysqli_query($connect,"SELECT * FROM `".$_GET['course_attendance']."` where `date` = '".date('y-m-d h:00:00')."' and `rollno` = '".$q1["rollno"]."'") or die("new student");
		$checkPreviousEntry = mysqli_fetch_array($checkPreviousEntry);

		//don't register entry if already registered
		if($checkPreviousEntry == true)
			header("Location:attendance_homepage.php?attendance_status=Attendance already registered&course=".$_SESSION['course']);
		//otherwise register today's attendance
		else
		{
			$q2 = mysqli_query($connect,"INSERT INTO `".$_GET['course_attendance']."` (`date`,`rollno`, `mobile_no`) VALUES ('".date('y-m-d h:00:00')."','".$q1["rollno"]."', '".$q1["mobile_no"]."')") or die("Attendance not registered");

			if($q2 == true)
				header("Location:attendance_homepage.php?attendance_status=Attendance registered&course=".$_SESSION['course']);
		}
	}
	/*//Not valid course choosen by student
	else{
		header("Location:course.php?error=Choose course carefully");
	}
	*/
}
//if coming this page without login
else{
	header("Location:index.php?error=You must login");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>

	<!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">

</head>
<body>

</body>
</html>

