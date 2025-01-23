<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save</title>
    <link rel="stylesheet" href="save.css">
</head>
<body>
    <!-- Php Save Code  -->
  <?php
  error_reporting(0);    // Error Hide
  include '../pages/dbconnect.php';   //db connect
  
  if ($_POST["save"]) {

    $name = strip_tags($_POST['name']);  // html tags remove karta hai 

      $hide = 1;

    $ltype = $_POST['type'];
    $eid = $_POST['id'];
    $ename = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Created = $_POST['Created'];

    $query = "INSERT INTO user VALUES('$ltype','$eid','$ename','$location','$email','$password',NOW())";
    $data = mysqli_query($conn, $query);  // query run

    if ($data) {
      echo '<div class="body_outer">';
      echo '<div class="success"> Thank You &nbsp <strong> Admin </strong> <br>&nbsp User details has been saved... </div>' . mysqli_connect_error();
      echo '<button class="previous" type="button" name="ok"><strong> OK</button>';
      echo '</body_outer>';
    } else {
      echo 'Failed';
    }
  }
  ?>
</body>
</html>