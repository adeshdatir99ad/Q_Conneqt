<?php
error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="../index.php"><img src="../img/img.png" alt="" /></a>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="../img/img.png" alt="" /></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="form.php">Form</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="view.php">View</a>
                </li>

                <!-- After Login User hide User Section -->
              <?php
              $type = $_SESSION['user_role'];
              ?>
    
                <?php if($type == 'Admin'){
                ?>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2" href="user.php">User Creation</a>
                  </li>
                <?php
                }?>
                                   
              </ul>
            </div>
          </div>
          <a href="logout.php" class="logout-button">Logout</a>
          <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>  
        </div>
      </nav>
      <!-- End-Navbar -->

       <!-- Hero Section -->
        <!-- <section class="hero-section">
            <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
                <h1>Responsive Navbar</h1>
                <h2>Bootstrap</h2>
            </div>
        </section> -->
        <!-- End Hero Section -->

        <!-- Navbar Active Link Line -->
         <script>
          const nav = document.querySelector(".navbar-nav");
          const navLinks = nav.querySelectorAll("a");
          const currentURL = window.location.href;
          navLinks.forEach((link)=>{
            if(link.href === currentURL){
              link.classList.add("active");
            } 
          });
         </script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>