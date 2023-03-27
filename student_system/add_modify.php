
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
    
    echo "<p>Add or Modify</p><br/><br/>";

    echo "<a href='add_modify.php?timetable=upload' ><button class='btn'>Add Time Table</button></a>";

    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

    echo "<a href='add_modify.php?timetable=view'><button>View Time Table</button></a>";

    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

    echo "<a href='add_modify.php?exam_date=add' target='frame'><button>Add Exam Date</button></a>";

    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

    if (isset($_GET['timetable'])) {
    	

    	if ($_GET['timetable'] == 'upload') 
    	{
    	
    	include 'img1.php';

    	}

    	else if ($_GET['timetable'] == 'view') 
    	{
    	
    	include 'img3.php';

    	}

    }

    else if (isset($_GET['exam_date'])) {

    	 //Mysql connection
        include_once "connectpage.php";

        $q1=mysqli_query($connect,"select `course` from `course` ") or die("Course table error");

        

        echo "<form method='get'>";

        echo "<br/>Choose Course : ";

        echo "<select name='course' required>";
        echo "<option value=''>--select a course--</option>";
        while($arr_q1=mysqli_fetch_array($q1))
        {
            echo "<option value='".$arr_q1['course']."'>".$arr_q1['course']."</option>";
        }
        echo "</select>";

        echo "<input type='hidden' name='exam_date' value='add_date'>";

        echo "<br/><br/>Choose Date : <input type='date' name='date' required><br/>";

        echo "<br/><input type='submit' value='submit'>";

        if (isset($_GET['date'])) {

        	//inserting date
        	$q1=mysqli_query($connect,"update `course` set `exam_date`='".$_GET['date']."' where `course`='".$_GET['course']."'") or die("Error in inserting date of exam");	
        	if ($q1 == true) {
        		echo "<br/>Date inserted";
        	}
        }
        

    }

}
else
header("Location:index.php?error=you must login<br/>");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Course</title>

    <!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">

</head>
<body>

</body>
</html>




