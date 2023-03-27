
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
include("EnggTGR_CURL_LIB.php");
$mobile="9521174640";
$message="Student was absent today";
$json = URL("https://smsapi.engineeringtgr.com/send/?Mobile=9785768762&Password=Q3326H&Message=".$message."&To=".$mobile."&Key=gevezOfZ5RHS7ChBaDAsqXPbj8M");

print_r($json);
if ($json["status"]==="success") {
    echo $json["msg"]."hello";
    //your code when send success
}else{
    echo $json["msg"]."hi";
    //your code when not send
}
echo $json["msg"].$json["status"]."abbcccdddd";
?>