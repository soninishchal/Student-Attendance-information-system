
<!DOCTYPE html>
<html>
<head>
	<title>Choose Course</title>

	<!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">
<style>

.sidenav {
  max-height: fit-content;
  width: 200px;
  position: fixed;
  top: 10%;
  left: 0;
  z-index: 1;
  padding-top: 20px;
}

.sidenav a {
  padding: 12px 15px;
  text-decoration: none;
  font-size: 16px;
  color: #818181;
  display: block;
  border: 3px solid #4CAF50;
}
.sidenav a:active, a:focus{
	background-color: #4CAF50;
	color: white;
}
.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-width: 820px) {
  .sidenav {padding-top: 15px;
			top: 20%;
  }
  .sidenav a {font-size: 8px;}
  #headpara-section{ padding: 200px; }

}
	.w3-sidebar {
    top: 20%;
    width: 100%;
    max-height: fit-content;
}
.applynow:hover{
	background: #4CAF50;
	color: white;
}
	iframe{
		top: 10%;
		width:100%;
		height: 100%;
		overflow: hidden;
		position: absolute;
	}
	li{
		display: block;
	}
	body{
		height: 100%;
		position: relative;
	}
	html{
		height: 300%;
	}
	button{
		display: block;
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
	
?>
	<header style="border-bottom: 5px solid #4CAF50; max-height: fit-content;">
		<div id="logo-section">
		
			<p><h1>Admin Section</h1></p>

		</div>
		<div id="headpara-section">

			<p><?php echo "Student Attendance & Information System"; ?></p>

		</div>
	</header>
<?php

	include 'connectpage.php';

	$_SESSION['page'] = 'admin.php';

?>	
	<div class="sidenav w3-light-grey w3-bar-block" style="width:15%">
					
<?php 

	echo "<a href='absent_student.php' target='frame' class='applynow bar-item w3-bar-itm w3-bar-item w3-button'>Absent Student</a>"; 
		
	echo "<a href='complaint.php' target='frame' class='applynow w3-bar-item w3-button'>Student Complaints</a>";

	echo "<a href='view_student.php' target='frame' class='applynow w3-bar-item w3-button'>View Student Record</a>";

	echo "<a href='add_student.php' target='frame' class='applynow w3-bar-item w3-button'>Add Student Record</a>";

	echo "<a href='delete_student.php' target='frame' class='applynow w3-bar-item w3-button'>Delete Student Record</a>";

	echo "<a href='view_teacher.php' target='frame' class='applynow w3-bar-item w3-button'>View Teacher Record</a>";

	echo "<a href='add_teacher.php' target='frame' class='applynow w3-bar-item w3-button'>Add Teacher Record</a>";

	echo "<a href='delete_teacher.php' target='frame' class='applynow w3-bar-item w3-button'>Delete Teacher Record</a>";
	
	echo "<a href='add_modify.php' target='frame' class='applynow w3-bar-item w3-button'>Add or Modify</a>";
		 
		  
	echo "<a href='logout.php' class='applynow w3-bar-item w3-button'>LogOut</a>";
		 
?>
</div>
<div style="margin-left: 18%;">
<iframe name="frame" style="width: 80%;top: 5%;margin: 0;height:100%;" frameBorder="0" scrolling="no"></iframe>
</div>
<div class="main_div"></div>
<?php

}
else
header("Location:index.php?error=you must login<br/>");

?>
