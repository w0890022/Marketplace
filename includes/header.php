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
        <a href="<?php echo $basePath; ?>/index.php">Home</a>
        <a href="<?php echo $basePath; ?>/books.php">Books</a>
        <a href="<?php echo $basePath; ?>/about.php">About</a>
        <a href="<?php echo $basePath; ?>/contact.php">Contact</a>
    </nav>

</header>