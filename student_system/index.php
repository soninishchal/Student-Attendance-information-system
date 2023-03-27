<?php

if (!isset($_SESSION)) {
  session_start();
}

//already login

if (isset($_SESSION['username'])) {
  header("Location:".$_SESSION['page']);
}

?>

<?php

//error handle
if (isset($_GET['error'])) {
  echo "<font color='red'>".$_GET['error']."</font>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student System PHP Project</title>

  <!-- Bootstrap Core CSS -->
  <link href="CSS/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="CSS/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="CSS/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Main CSS -->
  <link href="CSS/css/stylish-portfolio.min.css" rel="stylesheet">

  <!-- Login form css -->
  <link href="CSS/css/loginForm.css" rel="stylesheet">


  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>

</head>

<body id="page-top">

  <!-- Header -->
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <h1 class="mb-1">Student Attendance & <br/> Information System</h1>
      <h3 class="mb-5">
     </h3>
      <button onclick="document.getElementById('id01').style.display='block'; return false; " style="width:auto;" class="btn btn-primary btn-xl js-scroll-trigger">Login</button>

      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#services">Features</a>    
    </div>
    <div class="overlay"></div>
  </header>

<!-- Login Form -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" name="login_form" method="post" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="CSS/img/User.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="input-box1" value='<?php 
if(isset($_POST["submit-button1"]))
{
echo $uname;
}
?>' required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="input-box2" required>
      
      <button type="submit" name="submit-button1" >Login</button>

    </div>
    
  </form>
</div>

<!-- Closing login form -->
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


  <!-- Services -->
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0"></h3>
        <h2 class="mb-5">What This Project Does</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            1
          </span>
          <h4>
            <strong>Student Attendance</strong>
          </h4>
          <p class="text-faded mb-0">Paper-Free Attendance System</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            2
          </span>
          <h4>
            <strong>Information for Parents</strong>
          </h4>
          <p class="text-faded mb-0">Transfer SMS if any Student is absent</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            3
          </span>
          <h4>
            <strong>Study Related Complaints Solution</strong>
          </h4>
          <p class="text-faded mb-0">Student can write study related complaints and can get solution</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <span class="service-icon rounded-circle mx-auto mb-3">
            4
          </span>
          <h4>
            <strong>Time Saving Work</strong>
          </h4>
          <p class="text-faded mb-0">Admin can add, edit and delete Student and Teacher Records in less time</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <span class="service-icon rounded-circle mx-auto mb-3">
            5
          </span>
          <h4>
            <strong>One Place For All</strong>
          </h4>
          <p class="text-faded mb-0">Student can find Exam Date, fill Exam-Form, get current Time-Table and check Total Attendance</p>
        </div>
      </div>
    </div>
  </section>

</body>

</html>
