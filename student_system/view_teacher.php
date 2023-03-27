
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

	<!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">
  <link href="CSS/css/table.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="CSS/css/student_detail_form.css">

</head>
<body>

</body>
</html>

<?php

//session variable starting
if (!isset($_SESSION)) {
	session_start();
}

if ($_SESSION['username'] == "admin") {
	
	echo "<p><h4>View Teacher Record</h4></p>";
	
	include 'connectpage.php';
	$q1 = mysqli_query($connect,"select * from teacher");

		echo "<table id='students'>";
		echo "<tr>";
		echo "<th>Teacher Name</th>";
		echo "<th>Course</th>";
		echo "<th>Mobile number</th>";
		echo "<th>Username</th>";
		echo "</tr>";
		while ($q1_arr = mysqli_fetch_array($q1)) {

			echo "<tr><td>".$q1_arr[0]."</td><td> ".$q1_arr[1]."</td><td> ".$q1_arr[2]."</td><td> ".$q1_arr[3]."</tr>";
		
		}
		echo "</table>";

}
else
header("Location:index.php?error=you must login<br/>");

?>
	
