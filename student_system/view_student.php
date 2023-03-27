
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
		font-size: 18px;
	}
	*{
		font-size: 18px;
	}
</style>

</head>
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
	
	echo "<h3>View Student Record<h3>";
	echo "<br/>Choose Couse : ";

	include 'connectpage.php';
	$q1 = mysqli_query($connect,"select * from course");
	echo "<select onchange='window.location.href= this.value;'>";
	echo "<option>--select a course--</option>";
	while($q1_arr = mysqli_fetch_array($q1)) {
		
?>
		<option value="view_student.php?course=<?php echo $q1_arr[0]; ?>">
			<?php echo $q1_arr[0]; ?>
		</option>

<?php		

	}

?>
	
<?php

	echo "</select>";

	if (isset($_GET['course'])) {

		//showing student list for particular course
		$q1 = mysqli_query($connect,"select * from `".$_GET['course']."_students`") or die("error in getting results from course table");
		echo "<table id='students'>";
		echo "<br/><caption><h4>".$_GET['course']."_students </h4></caption><br/>";
		echo "<tr>";
		echo "<th>Rollno</th>";
		echo "<th>Student Name</th>";
		echo "<th>Mobile number</th>";
		echo "<th>Username</th>";
		echo "</tr>";
		while ($q1_arr = mysqli_fetch_array($q1)) {

			echo "<tr><td>".$q1_arr[0]."</td><td> ".$q1_arr[1]."</td><td> ".$q1_arr[2]."</td><td> ".$q1_arr[3]."</td></tr>";
		
		}
		echo "</table>";

	}

}
else
header("Location:index.php?error=you must login<br/>");


?>

