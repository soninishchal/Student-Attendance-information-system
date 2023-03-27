
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


if (isset($_SESSION['username'])) {


	$query = "Select rollno from `users` where `username`='".$_SESSION['username']."'";

	//database connection
	include 'connectpage.php';

	$q1 = mysqli_query($connect,$query) or die("Error : log user type not found".mysqli_error($connect));

	$array_q1 = mysqli_fetch_array($q1);
	
}

?>