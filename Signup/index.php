<?php
session_start();  
// error hide 
error_reporting(0);
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include './pages/dbconnect.php';
  $id = $_POST['id'];
  $password = $_POST['password'];

  $sql = "Select * from user Where id = '$id' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  // After Login User hide User Section
  if(!empty($row)){
    $_SESSION['user_role'] = $row['type'];
    $_SESSION['name'] = $row['name'];
    header("location:./pages/home.php");
  }

  // User and Admin Separate login
  if($row['type'] == "User"){
    $login = true;
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    header("location:./pages/form.php");

  }else if($row['type'] == "Admin"){
    $login = true;
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    header("location:./pages/user.php");

  }
  else{
    $showError = "Invalid Credentials";
  }
}
?>

<!DOCTYPE html PUBLIC "-/W3C//DTD XHTML 1.0 Transitional/EN">
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/3f8e3fa5f0.js" crossorigin="anonymous"></script>
  </head>
  <body>

  <!-- Navbar -->
  <?php require 'indexNavbar.php' ?> 
    
    <!-- Alert Message Show -->
    <?php
    if($showError){
      echo '<div class="alertred">
    <i class="fa-regular fa-circle-xmark icon"></i>
    <strong>Error!</strong> Invalid login credentials.
  </div>';
    }
    ?>

    <!-- Login Form -->
    <div class="logincontainer">
      <div class="form-box">
        <h1 id="title">Login</h1>
        <form action="" method="POST">
          <div class="inputgroup">  
            <div class="input-field">
              <i class="fa-solid fa-envelope"></i>
              <input type="text" placeholder="Employee Id" id="eid" name="id" required/>
            </div>

            <div class="input-field">
              <i class="fa-solid fa-lock"></i>
              <input type="password" placeholder="Password" id="password" name="password" required/>
            </div>
          </div>
          <div class="btn-field">
            <button type="submit" id="loginBtn" class="login"
            >Login</button>
          </div>
        </form>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/b4e94ed42f.js" crossorigin="anonymous" ></script>
  </body>
</html>
