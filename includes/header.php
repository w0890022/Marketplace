<?php

$isLocal = ($_SERVER['SERVER_NAME'] == 'localhost');

$basePath = $isLocal ? "/BookStore" : "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Samantha's Marketplace</title>

    <link rel="stylesheet" href="<?php echo $basePath; ?>/css/style.css">
</head>

<body>

<header>

    <h1>📚 Samantha's Marketplace</h1>

<nav>
    <a href="index.php">Home</a>
    <a href="books.php">Books</a>
    <a href="items.php">Other Items</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
</nav>

</header>