<?php
// Assuming a connection to the database
$conn = mysqli_connect("localhost", "root", "", "dataentry");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get start and end dates from GET parameters
$startDate = $_GET['startDate'] ?? '';
$endDate = $_GET['endDate'] ?? '';

// Convert the dates to MySQL-compatible format (Y-m-d)
$startDateFormatted = date('Y-m-d', strtotime($startDate));
$endDateFormatted = date('Y-m-d', strtotime($endDate));

// Query the database to get the clients within the date range
$query = "SELECT id, name, Email, Process, Designation, BusinessHead, Created FROM form WHERE Created BETWEEN ? AND ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $startDateFormatted, $endDateFormatted);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data from the result
$clients = [];
while ($row = $result->fetch_assoc()) {
    $clients[] = $row;
}

// Return the data as JSON
echo json_encode($clients);

// Close the connection
$conn->close();
?>
