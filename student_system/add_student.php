
<!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">
  <link href="CSS/css/table.css" rel="stylesheet">
  
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
h4{
    font-weight: 1;
    font-size: 18px;
  }
  *{
    font-size: 18px;
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
	
	echo "<h3> Add Student Record <h3>";
	echo "<br/>Choose Couse : ";

	include 'connectpage.php';
	$q1 = mysqli_query($connect,"select * from course");
	echo "<select onchange='window.location.href= this.value;'>";
	echo "<option>--select a course--</option>";
	while($q1_arr = mysqli_fetch_array($q1)) {
		
?>
		<option value="add_student.php?course=<?php echo $q1_arr[0]; ?>">
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

			echo "<tr><td>".$q1_arr['rollno']."</td><td> ".$q1_arr['name']."</td><td> ".$q1_arr['mobile_no']."</td><td> ".$q1_arr['username']."</td><tr>";
		
		}

		//insert record into student list for particular course
?>

<button id="myBtn">Add Student</button>

<?php

	}

	if (isset($_POST['submitbtn'])) {

		//insert record query into course table
			$sql = "INSERT INTO `".$_GET['course']."_students` (`rollno`, `name`, `mobile_no`, `username`, `password`) VALUES ('".$_POST[
			'rollno']."','".$_POST[
			'name']."', '".$_POST[
			'mobno']."', '".$_POST[
			'username']."', '".$_POST[
			'password']."')";
			$q1 = mysqli_query($connect,$sql)
			 or die("error in inserting record in course table".mysqli_error($connect));

			 if ($q1 == true) {
			 	echo "Record inserted successfully";
			 }
			 else
			 {
			 	echo "Record not inserted";
			 }

		//insert record query into login table
		$sql = "INSERT INTO `users` (`rollno`, `username`, `password`) VALUES ('".$_POST[
			'rollno']."','".$_POST[
			'username']."', '".$_POST[
			'password']."')";
			$q1 = mysqli_query($connect,$sql)
			 or die("error in inserting record in users table".mysqli_error($connect));
			 
	}

}
else
header("Location:index.php?error=Only for admin<br/>");

?>

<!-- Login Form -->
<div id="myModal" class="modal-content animate" >

    <form action="#" method="post">
          
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Add Student Details</h2>
      </div>      

    <div class="container">
  
      <label for="Rollno"><b>Rollno : </b></label>
      <input type="number" name="rollno" placeholder="Enter Roll No." required>

      <label for="name"><b>Student Name : </b></label>
      <input type="text" name="name" placeholder="Enter Student Name" required>

      <label for="mobno"><b>Mobile Number : </b></label>
      <input type="number" name="mobno" placeholder="Enter Mobile Number" required>

      <label for="username"><b>Username : </b></label>
      <input type="text" name="username" placeholder="Enter Username" required>

      <label for="password"><b>Password : </b></label>
      <input type="text" name="password" placeholder="Enter Username" required>

      <button type="submit" class="btn" name='submitbtn'>Submit</button>

    </div>
    
  </form>
</div>
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
