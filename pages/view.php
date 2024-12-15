<?php
include '../pages/sessionStart.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
  <?php require '../pages/navbar.php' ?>

  <div class="container my-5 first">
    <h2>List of Clients</h2>
    <a class="btn btn-primary" href="form.php" role="button" >New Client</a>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Process</th>
          <th>Designation</th>
          <th>Business Head</th>
          <th>Created</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
         error_reporting(0);
        $conn = mysqli_connect("localhost", "root", "", "dataentry");

        if($conn->connect_error){
          die("Connection failed". $conn->connect_error);
        }

        $sql = "Select * from form";
        $result = $conn -> query($sql);

        if (! $result){
          die("Invalid query: ". $conn->error);
        }

        //read data of each row
        while ($row = $result -> fetch_assoc()) {
          echo "
          <tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td>$row[Email]</td>
          <td>$row[Process]</td>
          <td>$row[Designation]</td>
          <td>$row[BusinessHead]</td>
          <td>$row[Created]</td>
          <td>
            <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
            <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
          </td>
        </tr>
          ";
        }
        ?>
        
      </tbody>
    </table>
  </div>
</body>
</html>