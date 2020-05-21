<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   if (isset($_SESSION['id']))
   {
     echo template("templates/partials/header.php");
     print_r($_POST);

     if(isset($_POST['btnsubmit']))
     {

       $students=$_POST['student'];
       $count = count($students);

       foreach ($students as $key => $studentid) {


           $sql = "DELETE FROM student WHERE studentid = '$studentid'";
           $result = mysqli_query($conn, $sql);

       }

         ///if this is works///
         if($result)
         {
           header("Location: students.php");
         }

       if($result)
       {
        printf("ERROR: ", mysqli_error($conn));
        exit();
       }
       echo template("templates/partials/footer.php");
     }
   }

?>
