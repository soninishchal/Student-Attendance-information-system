
  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  
<!DOCTYPE html5>
<html>
<head>
	<title>Student Section</title>

	<!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">
	<style>
		nav li{
			margin-top: -17px;
		}
	</style>
</head>
<body>
	
	<header>
		<div id="logo-section">
		
			<p><h1>Student Section</h1></p>

		</div>
		<div id="headpara-section">

			<p><?php echo "Student Attendance & Information System"; ?></p>

		</div>
	</header>

<?php

	include 'log_user_type.php';

	//session variable
	if (!isset($_SESSION)) {
		session_start();
	}

if (($array_q1['rollno'] != "admin" || $array_q1['rollno'] != "teacher") && isset($_SESSION['username'])) {
	
	?>
   
	<?php

		$_SESSION['page'] = 'student.php';

	?>

	<nav>
		<div id="left-side-nav">
			<div class="nav-section">
				<ul>
    <form action="#" method="post">
					<li>
            <!--Check total attendance-->
		<a class="bar-item" id="open-container"><Button type="submit" name="btn" value="Total attendance">Total attendance</Button></a></li>	
					<li><a class="bar-item" id="open-container2">
            <!--Check current time table-->
            <Button type="submit" name="btn" value="Time-Table">Time-Table</Button></a>
 </li>
					
            <li><a class="bar-item" id="open-container3">
              <!--Check Exam date-->
		<Button type="submit" name="btn" value="Exam Date">Exam Date</Button>
              </a>
</li>
          <li><a class="bar-item" id="open-container3">
          <!--Fill Exam form-->
		<Button type="submit" name="btn" value="Fill Exam Form">Fill Exam Form</Button></a>
</li>
          <li><a class="bar-item" id="open-container3">
          <!--Study Complain-->
		<Button type="submit" name="btn" value="Study Complaint">Study Complaint</Button></a>
</li>
          <li><a class="bar-item" id="open-container3">
          <!--Logout-->
		<Button type="submit" name="btn" value="logout">logout</Button></a>
</li>
          </form>
				</ul>	
			</div>
    </div>
	</nav>

<div class="main_div"> 

<?php

	function course(){

		//mysql connection
		include 'connectpage.php';

		$q0 = mysqli_query($connect,"select * from `course`") or die("error in POSTting all course name");

		return $q0;

	}
	//Check total attendance
	function totalAttendance()
	{
		//mysql connection
		include 'connectpage.php';

		//calling course function
		$q0 = course();

		while($q0_arr = mysqli_fetch_array($q0))
		{
			//creating variable for course_students
			$course_students = $q0_arr['course']."_students";

			//creating variable for course_attendance
			$course_attendance = $q0_arr['course']."_attendance";

			$q1 = mysqli_query($connect,"select * from `".$course_attendance."` where `rollno`=(select rollno from `".$course_students."` where `username`='".$_SESSION['username']."')") or die("Error from POSTting results from attendance table");

			if (mysqli_num_rows($q1) != 0) {

				echo "Total Attendance : ".mysqli_num_rows($q1);

			}

		}
		
	}

	//Check Current Time Table
	function timeTable()
	{
		echo "<iframe src='img3.php' width='100%' height='100%' frameBorder=0></iframe>";

	}


	//Check Exam Date
	function examDate()
	{

		//mysql connection
		include 'connectpage.php';

		//calling course function
		$q0 = course();
		echo "<form method='post'>";
		 echo "<br/>Choose Course : ";

	    echo "<select name='course' required='required'>";
	    echo "<option value=''>--select a course--</option>";

	    while($arr_q0=mysqli_fetch_array($q0))
	    {
	   		echo "<option value='".$arr_q0['course']."'>".$arr_q0['course']."</option>";
	    }
	    echo "</select>";

	     echo " <input type='submit' name='submitbtn_date' value='submit'>";

		echo "</form>";

	}

	
	if (isset($_POST['submitbtn_date'])) {
	     	
	     //mysql connection
	     include 'connectpage.php';

	     $q1 = mysqli_query($connect,"select `exam_date` from `course` where `course`='".$_POST['course']."'") or die("Error :".mysqli_error($connect));

	     $arr_q1=mysqli_fetch_array($q1);
	     echo "Exam Date : ".$arr_q1['exam_date'];
	     
	 }

	//Study Complaint
	function studyComplaint()
	{
		echo "<form method='post'>";
		echo "Enter Complaint : <br/><br/> <textarea name='complaint' id='text' rows='8' cols='60'>Feel free and enter your study complaint...</textarea>";
		echo "<br/><br/><input type='submit' name='submitbtn_complaint' value='submit'>";
		echo "</form>";
	}

	if (isset($_POST['btn'])) {
		
		if ($_POST['btn'] == "Total attendance") {
			
			totalAttendance();

		}
		else if ($_POST['btn'] == "Time-Table") {
			
			timeTable();

		}
		else if ($_POST['btn'] == "Exam Date") {
			
			examDate();

		}
		else if ($_POST['btn'] == "Fill Exam Form") {
			
			header("Location:http://www.univraj.org");
		}
		else if ($_POST['btn'] == "Study Complaint") {
			
			studyComplaint();

		}
		else if ($_POST['btn'] == "logout") {
			
			header("Location: logout.php");

		}

	}
	
	if (isset($_POST['submitbtn_complaint'])) {
	     	
	     //mysql connection
	     include 'connectpage.php';
	     
	     //calling course function
		$q0 = course();

		while($q0_arr = mysqli_fetch_array($q0))
		{
			//creating variable for course_students
			$course_students = $q0_arr['course']."_students";

			$q1 = mysqli_query($connect,"select * from `".$course_students."` where `username`='".$_SESSION['username']."'") or die("Error :".mysqli_error(connect));

			if (mysqli_num_rows($q1) != 0) {

				$q1_arr = mysqli_fetch_array($q1);

				$q2 = mysqli_query($connect,"insert into `complaints` values('".date('y-m-d')."','".$q1_arr['rollno']."','".$q1_arr['name']."','".$q0_arr['course']."','".$_POST['complaint']."')") or die("Error during complaint registeration:".mysqli_error($connect));

				if ($q2 == true) {
					echo "Complaint registered";
				}

			}

		}

	     
	 }

}
else
header("Location:index.php?error=you must login for student<br/>");

?>
</div>
</body>
</html>