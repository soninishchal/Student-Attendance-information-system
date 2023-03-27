
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
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  max-height: fit-content;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
label{
  display: block;
}
*{
	font-weight: 1;
}
/* Modal Content */
.modal-content {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  max-width: 80%;
  max-height: fit-content;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
input[type=text],input[type=number]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
#myModal{
  display: none;
}

h2{
  margin-left: 10px;
}

.container{
  overflow: auto;
}
button[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
::-webkit-input-placeholder{
  color: transparent;
}
input[type=submit]:hover {
  background-color: #45a049;
}

div {
  background-color: #f2f2f2;
  padding: 20px;
}
  </style>

</head>
<body>

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

		echo "<h3>Add Teacher Record</h3>";

		include 'connectpage.php';

		//showing teacher list
		$q1 = mysqli_query($connect,"select * from `teacher`") or die("error in getting results from teacher table");

		echo "<table id='students'>";
		echo "<br/><caption><h4>"."Teacher Records </h4></caption><br/>";
		echo "<tr>";
		echo "<th>Teacher Name</th>";
		echo "<th>Course</th>";
		echo "<th>Mobile number</th>";
		echo "<th>Username</th>";
		echo "</tr>";

		while ($q1_arr = mysqli_fetch_array($q1)) {
			echo "<tr><td>".$q1_arr['teacher_name']."</td><td>".$q1_arr['course']."</td><td>".$q1_arr['mobile_no']."</td><td>".$q1_arr['username']."</td></tr>";
		}

		echo "</table>";

		//insert record into teacher table
?>
<br/>
<button id="myBtn" style="width:auto;">Add Teacher</button>

<br/><br/>
<!-- Login Form -->

<div id="myModal" class="container animate modal-content">

	<table>
		<form method="post">

			<div class="modal-header">
      		 <span class="close">&times;</span>
       			<h2>Add Teacher Details</h2>
     		 </div> 

			<div class="container">
  
		      <label for="Rollno"><b>Teacher Name :</b></label>
		      <input type="text" name="teacher_name" id="" required>

		      <label for="course"><b>Course :</b></label>
		      <select name='course' required style="width: 100%;margin: 10px 0px;">
					<option value="-1">Choose one</option>
					<option value="B.ca">BCA</option>
					<option value="B.com">BCOM</option>
					<option value="B.ba">BBA</option>
			  </select>

		      <label for="mobno"><b>Mobile number :</b></label>
		      <input type="number" name="mobno" id="" required>

		      <label for="username"><b>Username :</b></label>
		      <input type="text" name="username" id="" required>
		     
		      <label for="password"><b>Password :</b></label>
		      <input type="text" name="password" id="" required>

		      <input type="submit" name='submitbtn' value="submit">

   			 </div>
				
		</form>
	</table>
</div>

<?php

	if (isset($_POST['submitbtn'])) {
		
		//insert record query into course table
			$sql = "INSERT INTO `teacher` (`teacher_name`, `course`, `mobile_no`,`username`,`password`) VALUES ('".$_POST[
			'teacher_name']."','".$_POST[
			'course']."', '".$_POST[
			'mobno']."', '".$_POST[
			'username']."', '".$_POST[
			'password']."')";
			$q1 = mysqli_query($connect,$sql)
			 or die("error in inserting record in teacher table".mysqli_error($connect));

			 if ($q1 == true) {
			 	echo "Record inserted successfully";
			 }
			 else
			 {
			 	echo "Record not inserted";
			 }

		//insert record query into login table
		$sql = "INSERT INTO `users` (`rollno`, `username`, `password`) VALUES ('teacher','".$_POST[
			'username']."', '".$_POST[
			'password']."')";
			$q1 = mysqli_query($connect,$sql)
			 or die("error in inserting record in users table".mysqli_error($connect));
			 
	}
}
else
header("Location:index.php?error=you must login<br/>");

?>

<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>

</body>
</html>
