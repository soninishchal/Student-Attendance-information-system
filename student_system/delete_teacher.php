
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

	echo "<p>Delete Teacher Record</p>";
	
	include 'connectpage.php';
	$q1 = mysqli_query($connect,"select * from teacher");


		echo "<br/><br/><table id='students'><form method='post'>";
		echo "<caption>Teacher List</caption>";
		echo "<tr>";
		echo "<th></th>";
		echo "<th>Teacher Name</th>";
		echo "<th>Course</th>";
		echo "<th>Mobile number</th>";
		echo "<th>Username</th>";
		echo "</tr>";
		while ($q1_arr = mysqli_fetch_array($q1)) {

			echo "<tr><td><input type='radio' name='selected_teacher' value='".$q1_arr['3']."'></td><td>".$q1_arr[0]."</td><td> ".$q1_arr[1]."</td><td> ".$q1_arr[2]."</td><td> ".$q1_arr[3]."</tr>";
		
		}
		echo "</table>";
		echo "<tr><td><input type='submit' name='submit_btn'></td></tr>";
		echo "</form>";

	if (isset($_POST['submit_btn'])) {
					
		if (isset($_POST['selected_teacher'])) {
			
			//selecting info from particular course
			$q1 = mysqli_query($connect,"select * from `teacher` where username='".$_POST['selected_teacher']."'") or die("error in getting results from teacher table".mysqli_error($connect));

			$q1_arr = mysqli_fetch_array($q1);

			//session variable starting
			if (!isset($_SESSION)) {
				session_start();
			}
			
			//insert into deleted_records for backup
			$sql_q1= "insert into `deleted_records` values('teacher','".$q1_arr['teacher_name']."','".$q1_arr['mobile_no']."', '".$q1_arr['username']."','".$q1_arr['password']."','".$_SESSION['username']."')";
			$q2 = mysqli_query($connect,$sql_q1)
			or die("Error in creating backup record".mysqli_error($connect));

			//deleting record from teacher table
			$sql_q2= "delete from `teacher` where username='".$_POST['selected_teacher']."'";
			$q3 = mysqli_query($connect,$sql_q2)
			or die("Error in deleting record from teacher table".mysqli_error($connect));

			//deleting record from users table
			$sql_q3="delete from `users` where username='".$_POST['selected_teacher']."'";

			$q4 = mysqli_query($connect,$sql_q3)
			or die("Error in deleting record of users table".mysqli_error($connect));

			if ($q3 == true && $q4 == true) {
				echo "Record deleted successfully";
			}
		}
		else
		{
			echo "No record selected.Please select a record";
		}
	}

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style type="text/css">
  	input:not([type=submit]){
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
  </style>

</head>
</html>