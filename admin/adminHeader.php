<?php

$isLocal = ($_SERVER['SERVER_NAME'] == 'localhost');

$basePath = $isLocal ? "/BookStore" : "";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link rel="stylesheet" href="<?php echo $basePath; ?>/css/admin.css">

</head>

<body>

<header class="admin-header">

<h1>📚 Marketplace Admin</h1>

<nav>

<a href="<?php echo $basePath; ?>/admin/inventory.php">
Inventory
</a>

<a href="<?php echo $basePath; ?>/admin/addItem.php">
Add Item
</a>

<a href="<?php echo $basePath; ?>/index.php">
View Website
</a>

<a href="logout.php">
Logout
</a>
</nav>

</header>