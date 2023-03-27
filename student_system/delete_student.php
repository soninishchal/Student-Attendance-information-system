
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
	h3{
		font-weight: 1;
		font-size: 18px;
	}
	*{
		font-size: 18px;
	}
</style>
</head>
<body>

</body>
</html>

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

	echo "<h3>Delete Student Record</h3>";

	echo "<br/>Choose Course : ";

	include 'connectpage.php';
	$q1 = mysqli_query($connect,"select * from course");
	echo "<select onchange='window.location.href= this.value;' >";
	echo "<option>--select a course--</option>";
	while($q1_arr = mysqli_fetch_array($q1)) {
		
?>
		<option value="delete_student.php?course=<?php echo $q1_arr[0]; ?>">
			<?php echo $q1_arr[0]; ?>
		</option>

<?php	

	}

	echo "</select>";

	if (isset($_GET['course'])) {

		//showing student list for particular course
		$q1 = mysqli_query($connect,"select * from `".$_GET['course']."_students`") or die("error in getting results from course table");

		echo "<form method='post'><table id='students'>";
		echo "<br/><caption>".$_GET['course']."_students</caption>";
		echo "<tr>";
		echo "<th></th>";
		echo "<th>Rollno</th>";
		echo "<th>Student Name</th>";
		echo "<th>Mobile number</th>";
		echo "<th>Username</th>";
		echo "</tr>";
		
		while ($q1_arr = mysqli_fetch_array($q1)) {

			echo "<tr><td><input type='radio' class='checkmark' value='".$q1_arr[0]."' name='selected_student'></td><td>".$q1_arr[0]."</td><td> ".$q1_arr[1]."</td><td> ".$q1_arr[2]."</td><td> ".$q1_arr[3]."</tr>";
		}
		echo "</table>";
		echo "<tr><td><input type='submit' value='submit' name='submit_btn'></td></tr>";
		echo "</form>";

	}

	if (isset($_POST['submit_btn'])) {

		if (isset($_POST['selected_student'])) {
			
			echo $_POST['selected_student'];
			echo $_GET['course']."_students";

			//selecting info from particular course
			$q1 = mysqli_query($connect,"select * from `".$_GET['course']."_students` where rollno='".$_POST['selected_student']."'") or die("error in getting results from course table".mysqli_error($connect));

			$q1_arr = mysqli_fetch_array($q1);

			//session variable starting
			if (!isset($_SESSION)) {
				session_start();
			}

			//insert into deleted_records for backup
			$sql_q1= "insert into `deleted_records` values('".$q1_arr[0]."','".$q1_arr[1]."','".$q1_arr[2]."', '".$q1_arr[3]."','".$q1_arr[4]."','".$_SESSION['username']."')";
			$q2 = mysqli_query($connect,$sql_q1)
			or die("Error in creating backup record".mysqli_error($connect));

			//deleting record from course table
			$sql_q2= "delete from `".$_GET['course']."_students` where rollno='".$q1_arr[0]."'";
			$q3 = mysqli_query($connect,$sql_q2)
			or die("Error in deleting record of particular course table".mysqli_error($connect));

			//deleting record from users table
			$sql_q3="delete from `users` where username='".$q1_arr[3]."'";

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






