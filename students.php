<html>
<head>
 <title>Student Records</title>
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
 <body>
   <div class="container"></div>



   <form method="get" action="">
   </form>

   <hr>
   <table class="table table-striped">

<?php

//// test this////
if (isset($_POST['btnsubmit']))
{
  $link = mysql_connect("localhost","root","", "oss-cw2" );
  mysqli_select_db("root", $link);
  $checkbox = $_POST("checkbox");
  for ($i=0; $si<count($checkbox); $i++)
  {
    $studentid = $checkbox($i);
    $sql = "DELETE FROM student WHERE studentid= '$studentid'";
    $result = mysqli_query($sql, $link);
  }
  mysqli_close();
}
   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   /////if logged...///

   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "select * FROM student";

      $result = mysqli_query($conn,$sql);
      $data['content'] .= "<form name= 'students' method='post' action='deletestudent.php'>";
      // prepare page content
      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th colspan='5' align='center'>Student Records</th></tr>";
      $data['content'] .= "<tr><th>Student ID</th><th>Name</th><th>D.O.B</th><th>Address</th><th>Checkbox</th></tr>";

      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[studentid]</td>";
         $data['content'] .= "<td> $row[firstname] $row[lastname] </td>";
         $data['content'] .= "<td> $row[dob] </td>";
         $data['content'] .= "<td> $row[house], $row[town], $row[county], $row[country], $row[postcode]</td>";
         $data['content'] .= "<td> <input name='student[]'
         id=student type= 'checkbox' value = '$row[studentid]'></td</tr>";

      }
      $data['content'] .= "</table>";

      $data['content'] .= "<br><input type='submit' name='btnsubmit' value='Delete'></br>";


      $data['content'] .= "</form>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>

</body>
</div>
</table>
</html>
