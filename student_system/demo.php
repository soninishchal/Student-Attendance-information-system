
  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  <html>
<body>
<form method="post">
<?php
    include('way2sms-api.php');
    $client = new WAY2SMSClient();
   
    $client->login("9521174640","H8992F");//fix
    
    $client->send("9521926936", "Student was absent today");//jisko send karna hai uska mobile number, message
   $client->logout();
   echo "Message Send";
?>
<!--
<?php
if(isset($_POST['t1']))
{ 
    include('way2sms-api.php');
    $client = new WAY2SMSClient();
    $client->login($_POST['t1'], $_POST['t2']);
    $client->send($_POST['t3'], $_POST['t4']);
   $client->logout();
   echo "Message Send";
}
else
{
?>
WayToSms Username<input type="text" name="t1" /><br />
WayToSms Password<input type="password" name="t2" /><br />
Mobile Number<input type="text" name="t3" /><br />
Message<input type="text" name="t4" /><br />
<input type="submit" />
<?php
}
?>-->
</form>
</body>
</html>
