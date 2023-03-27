
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

	//redirected from attendance_homepage.php if not a student of selected course
	if(isset($_GET['error']))
	{
		echo "<font color='red'>".$_GET['error']."</font>";
	}

//session variable starting
if (!isset($_SESSION)) {
	session_start();
}

//checking log user type
include 'log_user_type.php';

//If student coming after login
if($_SESSION['username'] && ($array_q1['rollno'] == "teacher"))
{
	echo "<br/><p><h1>Attendance Section</h1><br/>&nbsp;&nbsp;Choose Course :</p>";

	//Mysql connection
	include_once "connectpage.php";

	$q1=mysqli_query($connect,"select * from `course` ") or die("Course table error");

	while($arr_q1=mysqli_fetch_array($q1))
	{
		echo "<br/>";
		
?>

		<a id='special_link' href="attendance_homepage.php?course=<?php echo $arr_q1['course']; ?>">
			
			<?php echo $arr_q1['course']; ?>

		</a>
<?php

		echo "<br/>";

	}

}
//if coming this page without login
else{
	header("Location:index.php?error=You must login<br/>");
}

//date_default_timezone_set("Asia/Kolkata");
//echo date("y-m-d h.00");
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

