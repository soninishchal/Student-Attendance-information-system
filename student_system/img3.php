 <?php

    //session variable
    if (!isset($_SESSION)) {
        session_start();
    }

if (isset($_SESSION['username'])){

    $nm="";
    if(isset($_GET['course']))
    {
        $nm = "img2.php?course=".$_GET['course'];
    }
    ?>
        <html>
            <body>
                <form action='img3.php' method="Get" >
                    <br/><br/>
        Choose Course : 
<?php

         //Mysql connection
        include "connectpage.php";

        $q1=mysqli_query($connect,"select `course` from `course` ") or die("Course table error");

        echo "<select name='course' required>";
        echo "<option value=''>--select a course--</option>";
        while($arr_q1=mysqli_fetch_array($q1))
        {
            echo "<option value='".$arr_q1['course']."'>".$arr_q1['course']."</option>";
        }
        echo "</select>";

         if (isset($_GET['showMe'])) {

    ?>
        <br/>
        <img onclick='showFull()' src="<?php echo $nm; ?>" width="100px" height="100px"/>

    <?php
        echo "<br/>Click on image to zoom<br/>";

        }      

?>      
            <input type="hidden" name='showMe' value='1'>
             <input type="submit" /><br />

            </form>
            <script type="text/javascript">
                var i=0;
                function showFull() {

                    if (i == 0) {

                        document.getElementsByTagName('img')[0].style.width="auto";
                        document.getElementsByTagName('img')[0].style.height="auto";
                        document.getElementsByTagName('img')[0].style.position="absolute";
                        document.getElementsByTagName('img')[0].style.overflow="auto";
                        i = 1;
                    }

                    else if (i == 1) {

                        document.getElementsByTagName('img')[0].style="none";
                           i = 0;

                    }
                }
                function showImage() {
                     document.getElementsByTagName('img')[0].style.display="block";
                 }
            </script>
        </body>
    </html>
<?php

}
else
header("Location:index.php?error=you must login<br/>");

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Main CSS -->
  <link href="CSS/css/w3css.css" rel="stylesheet">
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
