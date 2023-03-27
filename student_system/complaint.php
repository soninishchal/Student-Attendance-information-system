
<!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>

	<!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">
  <link href="CSS/css/table.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

	echo "<h4><p>Student Complaints</p></h4>";

	//mysql connection
	include 'connectpage.php';

	$q1 = mysqli_query($connect,"select * from `complaints`") or die("Error during viewing complaints");

	while ($q1_array = mysqli_fetch_array($q1)) {
		
		echo '<div class="w3-panel w3-green" style="background-color: #4CAF50; color: white; padding: 10px 10px; margin: 10px;">';

		echo "<p>Date : ".$q1_array['date']."</p>";	
		echo "<p>Rollno : ".$q1_array['rollno']."</p>";
		echo "<p>Student Name : ".$q1_array['name']."</p>";
		echo "<p>Course : ".$q1_array['course']."</p>";
		echo "<p><textarea rows='5' cols='50' readonly>Complaint : ".$q1_array['complaint']."</textarea>"."</p>";

		echo "</div>";
	}
}
else
header("Location:index.php?error=you must login<br/>");

?>