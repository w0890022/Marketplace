<?php

include "../includes/db.php";

$id = $_GET['id'];

$sql = "DELETE FROM items WHERE id=$id";

$conn->query($sql);

header("Location: inventory.php");
exit();

?>