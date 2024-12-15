<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $conn = mysqli_connect("localhost", "root", "", "dataentry");

    $sql = "DELETE FROM form WHERE id = $id";
    $conn -> query($sql); 
}

header("location: View.php");
exit;
?>