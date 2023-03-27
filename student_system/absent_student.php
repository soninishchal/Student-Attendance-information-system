
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

if ($_SESSION['username'] == "admin") {

	echo "<h4><p>Absent Students</p></h4>";

	//setting timezone to india
	date_default_timezone_set("Asia/Kolkata");

	include 'connectpage.php';

	$q0 = mysqli_query($connect,"select * from `course`") or die("error in getting all course name");

	echo "<table id='students'>";
	echo "<tr>";
	echo "<th>Rollno</th>";
	echo "<th>Student Name</th>";
	echo "<th>Mobile Number</th>";
	echo "<tr>";

	//array for adding students mobile no
	$mobile_no = array();
	$i=0;

	while($q0_arr = mysqli_fetch_array($q0))
	{
		//creating variable for course_students
		$course_students = $q0_arr['course']."_students";

		//creating variable for course_attendance
		$course_attendance = $q0_arr['course']."_attendance";

		$q1 = mysqli_query($connect,"select * from `".$course_students."` where rollno not IN(select distinct rollno from `".$course_attendance."` where date like '".date("20y-m-d")."%')") or die("Error from getting results from particular course table");

		while($q1_arr = mysqli_fetch_array($q1))
		{
			echo "<tr>";
			echo "<td>".$q1_arr['rollno']."</td>";
			echo "<td>".$q1_arr['name']."</td>";
			echo "<td>".$q1_arr['mobile_no']."</td>";
			echo "</tr>";

			//adding into list for sending msg
			$mobile_no[$i] = $q1_arr['mobile_no'];
			$i++;

		}

	}

	//echo mysqli_num_rows($q1)."<br/>";

	echo "</table>";

	echo "<br/>";
	//print_r($mobile_no);

	echo "<a href='sms.php'><button>Send Msg</button></a>";
}
else
header("Location:index.php?error=you must login<br/>");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>

	<!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">
  <link href="CSS/css/table.css" rel="stylesheet">

</head>
<body>

</body>
</html>







