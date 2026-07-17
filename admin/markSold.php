<?php
include "auth.php";
include "../includes/db.php";


$id = $_GET['id'];


// Get current status

$sql = "SELECT status FROM items WHERE id=$id";

$result = $conn->query($sql);

$item = $result->fetch_assoc();


// Toggle status

if ($item['status'] == "Available") {

    $newStatus = "Sold";

} else {

    $newStatus = "Available";

}


// Update status

$sql = "UPDATE items 
        SET status='$newStatus'
        WHERE id=$id";


$conn->query($sql);


header("Location: inventory.php");
exit();
?>