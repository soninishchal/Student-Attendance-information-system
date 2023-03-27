
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

//session variable
if (!isset($_SESSION)) {
	session_start();
}

echo "processing... logout";

session_destroy();
unset($_SESSION['username']);
header("Location: index.php");

?>