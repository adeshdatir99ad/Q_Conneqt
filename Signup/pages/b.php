<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
<nav>
    <ul class="sidebar">
      <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a></li>
      <li><a href="home.php">Home</a></li>
      <li><a href="form.php">Form</a></li>
      <li><a href="view.php">View</a></li>
      <li><a href="user.php">User Creation</a></li>
      <li><a href="logout.php" style="font-size: 16px;">Logout</a></li>
    </ul>
    <ul>
        <!-- <img src="img.png" alt="" /> -->
      <li><a href="../index.php"><img src="../img/img.png" alt="" /></a></li>
      <li class="hideOnMobile"><a href="home.php">Home</a></li>
      <li class="hideOnMobile"><a href="form.php">Form</a></li>
      <li class="hideOnMobile"><a href="view.php">View</a></li>
      <li class="hideOnMobile"><a href="user.php">User Creation</a></li>
      <li class="hideOnMobile"><a href="logout.php" style="font-size: 16px;">Logout</a></li>
      <li class="menu-button" style="border: none;" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></li>
    </ul>
  </nav>
  <script>
    function showSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }
    function hideSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
  </script>
</body>
</html>