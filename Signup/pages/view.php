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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css">
</head>

<body>
  <?php require '../pages/navbar.php' ?>

  <div class="container my-5 first">
    <h2>List of Clients</h2>
    <a class="btn btn-primary mb-4" href="form.php" role="button">New Client</a>

    <?php if ($type == 'Admin') {
    ?>

      <div class="container">
        <form id="dateRangeForm">
          <div class="row d-flex justify-content-center">
            <div class="col-md-3">
              <label for="startDate" class="form-label">Start Date</label>
              <input type="text" class="form-control" id="startDate" placeholder="Select start date" readonly>
            </div>
            <div class="col-md-3">
              <label for="endDate" class="form-label">End Date</label>
              <input type="text" class="form-control" id="endDate" placeholder="Select end date" readonly>
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button type="button" class="btn btn-success" id="exportButton">Export</button>
            </div>
          </div>
        </form>
      </div>


    <?php } ?>

    <br>
    <div class="table-responsive table-wrapper">
      <table class="table bdr">
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

          if ($conn->connect_error) {
            die("Connection failed" . $conn->connect_error);
          }

          $sql = "Select * from form";
          $result = $conn->query($sql);

          if (! $result) {
            die("Invalid query: " . $conn->error);
          }

          //read data of each row
          while ($row = $result->fetch_assoc()) {
            // After 48hrs edit Button hide (logic)
            $createdTime = strtotime($row['Created']);  // Convert created timestamp to UNIX time
            $currentTime = time();  // Get the current UNIX time
            $timeDiff = $currentTime - $createdTime;  // Calculate the time difference in seconds
            $showEditButton = $timeDiff <= (48 * 3600);  // True if within 48 hours

            echo "
          <tr>
          <td>$row[id]</td>
          <td>$row[name]</td>
          <td>$row[Email]</td>
          <td>$row[Process]</td>
          <td>$row[Designation]</td>
          <td>$row[BusinessHead]</td>
          <td>$row[Created]</td>
          <td>";
            if ($type == 'Admin') {
              // Admin can see Edit button for all rows
              echo " <a class='btn btn-primary btn-sm' id='hidebutton' href='edit.php?id=$row[id]'>Edit</a>";
            } elseif ($type == 'User' && $showEditButton) {
              echo " <a class='btn btn-primary btn-sm' id='hidebutton' href='edit.php?id=$row[id]'>Edit</a>";
            }
            // Admin can see Delete button 
            if ($type == 'Admin') {
              echo " <a class='btn btn-danger btn-sm'  href='delete.php?id=$row[id]'>Delete</a>";
            }
            echo "
          </td>
        </tr>
         ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery (required for Bootstrap-datepicker) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap Datepicker JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>

  <script>
    // (date picker is opened), apply blur to the table
    $('#startDate, #endDate').on('focus', function() {
      $('.table-responsive').addClass('table-blurred'); // Apply blur to the table
      $('body').append('<div class="blur-overlay"></div>'); // Add an overlay for better blur effect
    });

    // date picker is closed, remove the blur effect
    $('#startDate, #endDate').on('changeDate', function() {
      $('.table-responsive').removeClass('table-blurred'); // Remove blur from the table
      $('.blur-overlay').remove(); // Remove the overlay
    });

    // Remove blur if clicking outside the date picker or input fields
    $(document).on('click', function(e) {
      if (!$(e.target).closest('.datepicker, .form-control').length) {
        $('.table-responsive').removeClass('table-blurred'); // Remove blur if clicking outside
        $('.blur-overlay').remove(); // Remove the overlay
      }
    });


    // Date Pickers and export file excel 
    $(document).ready(function() {
      // Initialize date pickers
      $('#startDate').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true
      });

      $('#endDate').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true
      });

      // Export button functionality
      $('#exportButton').click(function() {
        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();

        if (startDate && endDate) {
          // Send an AJAX request to fetch the client data within the selected date range
          $.ajax({
            url: 'fetch_clients.php', // The PHP script to handle data fetch
            method: 'GET',
            data: {
              startDate: startDate,
              endDate: endDate
            },
            success: function(response) {
              const clients = JSON.parse(response);
              exportToExcel(clients, startDate, endDate);
            }
          });
        } else {
          alert('Please select both start and end dates.');
        }
      });
    });

    function exportToExcel(data, startDate, endDate) {
      const ws = XLSX.utils.json_to_sheet(data); // Convert JSON to Excel sheet
      const wb = XLSX.utils.book_new(); // Create a new workbook
      XLSX.utils.book_append_sheet(wb, ws, 'Clients Data'); // Append sheet to workbook

      // Generate Excel file with date range in the filename
      XLSX.writeFile(wb, `clients_${startDate}_to_${endDate}.xlsx`);
    }
  </script>
</body>

</html>