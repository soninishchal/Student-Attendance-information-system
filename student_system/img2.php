<?php

//session variable starting
if (!isset($_SESSION)) {
        session_start();
}

if (isset($_SESSION['username'])) {

include 'connectpage.php';

$sql = "select * from course where course='".$_GET['course']."'";

$result = mysqli_query($connect,$sql) or die('Bad query at 12!'.mysqli_error($connect));

if($row = mysqli_fetch_array($result)){
  $db_img = $row['time_table'];
}

$db_img = base64_decode($db_img);
    
$db_img = imagecreatefromstring($db_img);

header("Content-Type: image/jpeg");

imagejpeg($db_img);
    
imagedestroy($db_img);
}
else
header("Location:index.php?error=you must login<br/>");

?>
  <!-- If javascript is disabled-->
  <noscript>
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
