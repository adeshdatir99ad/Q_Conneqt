<?php
include '../pages/sessionStart.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - <?php echo $_SESSION['id']?></title>
  <link rel="stylesheet" href="../pages/home.css">
</head>
<body>
  <?php require '../pages/navbar.php' ?>

  <!-- Hero Section -->
        <section class="hero-section">
            <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
                <h1>Hello</h1>
            </div>
        </section>
  <!-- End Hero Section -->
</body>
</html>