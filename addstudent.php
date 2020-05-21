<html>
<head>
 <title>Add Student</title>
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  </head>
 <body>
   <div class="container">
   <form method="get" action="">
   </form>

   <hr>

<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");



include_once 'addstudent.php';
if (isset($_SESSION['id']))
 {
     echo template("templates/partials/header.php");
     print_r($_POST);

if (isset($_POST['submit'])){


    $students=$_POST['studentid'];
    $count = count($students);


    $studentid = mysqli_real_escape_string($conn,$_POST['studentid']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $house = mysqli_real_escape_string($conn,$_POST['house']);
    $town = mysqli_real_escape_string($conn,$_POST['town']);
    $county = mysqli_real_escape_string($conn,$_POST['county']);
    $country = mysqli_real_escape_string($conn,$_POST['country']);
    $postcode = mysqli_real_escape_string($conn,$_POST['postcode']);





  $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)
      VALUES ('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode')";

        $result = mysqli_query($conn,$sql);


      if ($conn->query($sql) === TRUE) {

        echo "New record created successfully";
      } else{

        echo "Error: " . $sql . "<br>" . $conn->error;
      }





        if($result)
        {
          header("Location: students.php");

        }
        mysqli_close($conn);


        }










}


   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");


      $data['content'] = <<<EOD

<html>
<body>
   <h2>Add New Student Details</h2>
  <form method="post" action="addstudent.php">

  <br>Student ID
  <input type ="text" name="studentid"></br>

  <br>Password
  <input type="text" name="password"><br/>

  <br>DOB
  <input type="date" name="dob"><br/>

  <br>First Name
  <input type="text" name="firstname"><br/>

   <br>Last Name
   <input type="text" name="lastname"><br/>

   <br>House
   <input type="text" name="house"><br/>

   <br>Town
   <input type="text"name="town"><br/>

   <br>County
   <input type="text" name="county"><br/>

   <br>Country
   <input type="text" name="country"><br/>

   <br>Postcode
   <input type="text" name="postcode"><br/>

   <br></br>
   <input type= "submit" value="submit" name="submit">

   </form>
   </body>
   </html>

EOD;



   // render the template
   echo template("templates/default.php", $data);



echo template("templates/partials/footer.php");

?>
