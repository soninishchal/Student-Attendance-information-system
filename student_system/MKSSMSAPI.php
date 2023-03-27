<?php
$mobile="9521174640";
$message="Student was Absent";
$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9521174640&Password=varun123&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=varunftzdW2IsuQ4aBHcKjCZ"),true);

if ($json["status"]==="success") {
    echo $json["msg"];
    //your code when send success
}else{
    echo $json["msg"];
    //your code when not send
}
?>

  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  
 