
  <!-- If javascript is disabled-->
  <noscript>
  <!--?php header("Location:../javascript_disable.php"); ?>-->
  <div class="no_script">
  <H4>Javascript is disabled.</h4>
  <p>Goto Settings and turn on(or allow) Javascript</p>
  <a href="https://enable-javascript.com">click for more info</a>
  </div>
  </noscript>
  
  <!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        input[type=file]::-webkit-file-upload-button {
             visibility: hidden;
             padding: 20px;
        }
        input[type=file]::before {
              content: 'Choose file';
              background: #4CAF50;
              border-radius: 3px;
              padding: 10px;
              -webkit-user-select: none;
              cursor: pointer;
              font-size: 13pt;
              color: white;
        }
        
    </style>
</head>
<body>

</body>
</html>

<?php

//session variable starting
if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['username']) {

    if(isset($_POST['course']))
    {
        $nm=$_FILES['file1']['tmp_name'];
        //echo $nm;
        $handle = fopen($nm, "rb");
        $img = fread($handle, filesize($nm));
        fclose($handle);
        
        include 'connectpage.php';

        if (filesize($nm)<=100000) {
          $img = base64_encode($img);
        $sql = "update `course` set `time_table`='$img' where `course`='".$_POST['course']."'";

        mysqli_query($connect,$sql) or die(mysqli_error($connect));

        echo "<br/>Success! You have inserted your data!";
        }
        else
          echo "<br/>Only 100KB file size allowed";
    }
    else
    {
    ?>
        <html>
            <body>
                <form method="post" enctype="multipart/form-data">
       <br/><br/>
        Choose Course : 
     <?php

         //Mysql connection
        include_once "connectpage.php";

        $q1=mysqli_query($connect,"select `course` from course ") or die("Course table error");

        echo "<select name='course' required>";
        echo "<option value=''>--select a course--</option>";
        while($arr_q1=mysqli_fetch_array($q1))
        {
            echo "<option value='".$arr_q1['course']."'>".$arr_q1['course']."</option>";
        }
        echo "</select>";

    ?>
    <br>
    <br>
        Choose a Image : <input type="file" name="file1" required /> * Only JPG file (Upto 100KB) <br/>
                    <input type="submit"/><br />
                </form>
            </body>
        </html>
    <?php
    }
}
else
header("Location:index.php?error=you must login<br/>");

?>