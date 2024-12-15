<?php
include '../pages/sessionStart.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Creations</title>
  <link rel="stylesheet" href="user.css">
</head>
<body>
  <?php require '../pages/navbar.php' ?> 
  
  <?php require '../pages/save.php' ?>  


  <!-- Hide this Content -->
  <?php
  if (!isset($hide)) {
  ?>

    <!-- Form -->
    <div class="border">
      <div class="containerfirst">
        <!-- Title section -->
        <div class="title">Search Results</div>
        <div class="content">
          <!-- Registration form -->
          <form action="#" method="POST">
            <div class="scroll">
              <div class="login-details">
                <!-- Type -->
                <div class="input-box">
                  <span class="details">Login Type</span>
                  <select name="type" class="input" required>
                    <option value="" disabled selected>Select</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                  </select>
                </div>
                <!-- Input for Id -->
                <div class="input-box">
                  <span class="details">Employee ID</span>
                  <input type="text" placeholder="Enter your Id" name="id" required>
                </div>

                <div class="button_layout">
                  <div class="Search_button">
                    <input type="submit" value="Search" name="search_submit" onclick=hideButton()>
                  </div>
                </div>
              </div>

                                     <!-- Php Search Code -->
  <?php
  include '../pages/dbconnect.php';  // db connect
  //  if(isset($_POST['search_submit'])){
    $search = $_POST['id'];
    
    $sql = "SELECT * FROM user WHERE id = '$search' ";
    $result = mysqli_query($conn,$sql);
    if($result){
      // if(mysqli_num_rows($result)> 0){
        $row = mysqli_fetch_assoc($result);
        ?>
           <div class="user-details">
                <!-- Input for Name -->
                <div class="input-box">
                  <span class="details">Employee Name</span>
                  <input type="text" placeholder="Enter your Name" name="name" value="<?php echo $row['name']; ?>">
                </div>
                <!-- Input for Location -->
                <div class="input-box">
                  <span class="details">Location</span>
                  <input type="text" placeholder="Enter your Location" name="location" value="<?php echo $row['location']; ?>" >
                </div>
                <!-- Input for Password -->
                <div class="input-box">
                  <span class="details">Email ID</span>
                  <input type="email" placeholder="Enter your Email" name="email" value="<?php echo $row['email']; ?>" >
                </div>
                <!-- Input for Confirm Password -->
                <div class="input-box">
                  <span class="details">Password</span>
                  <input type="password" placeholder="Confirm your password" name="password" value="<?php echo $row['password']; ?>" >
                </div>
              </div>
            </div>
        <?php
        if(isset($_POST['search_submit'])){
        if(mysqli_num_rows($result)== 0){
          echo '<h4 style="margin-left: 9px; padding: 10px 0;  color: #f44336;">Data not found</h4>';
        }
      }
      // }else{
      //   echo '<h2 style="margin-left: 9px; padding: 10px 0;">Data not found</h2>';
      // }
  //   }
   }
    ?>
   
   <?php if(isset($_POST['search_submit'])){
     $search = isset( $_POST['save'] ) && $_POST['cancel'];
   }else{
    ?>
            <!-- Save button -->
            <div class="layout">
              <div class="button">
                <input type="submit" value="Save" name="save" >
              </div>

              <div class="button">
                <a href="user.php"><input type="submit" value="Reset" name="Reset" ></a>
              </div>
            </div>
  <?php }?>
          </form>
        </div>
      </div>
    </div>
  <?php
  } ?>

  <!-- Navbar -->
  <script>
    function showSidebar() {
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }

    function hideSidebar() {
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }

    // back and Clear Form
    let btnClick = document.querySelector(".previous");

    btnClick.addEventListener("click", () => {
      window.location.href = "user.php";
    });

    function hideButton() {
      document.getElementById("save").style.visibility='hidden';
      // const sidebar = document.querySelector('.layout')
      // sidebar.style.display = 'none'
    }
    
  </script>
</body>

</html>