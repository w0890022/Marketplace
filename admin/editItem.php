<?php
include "auth.php";
include "../includes/db.php";
include "adminHeader.php";


$id = $_GET['id'];


$sql = "SELECT * FROM items WHERE id=$id";

$result = $conn->query($sql);

$item = $result->fetch_assoc();


if(isset($_POST['update'])) {


$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'];


$image = $item['image'];


if (!empty($_FILES['image']['name'])) {


    $image = $_FILES['image']['name'];

    $target = "../uploads/" . basename($image);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

}



$sql = "UPDATE items SET

title='$title',
author='$author',
category='$category',
price='$price',
description='$description',
image='$image'

WHERE id=$id";


$conn->query($sql);


header("Location: inventory.php");
exit();

}

?>


<main>

<h2>Edit Item</h2>

<form method="POST" enctype="multipart/form-data">


<label>
Title:
</label>

<input 
type="text" 
name="title" 
value="<?php echo $item['title']; ?>"
>


<br><br>


<label>
Author:
</label>

<input 
type="text" 
name="author" 
value="<?php echo $item['author']; ?>"
>


<br><br>


<label>
Category:
</label>

<input 
type="text" 
name="category" 
value="<?php echo $item['category']; ?>"
>


<br><br>


<label>
Price:
</label>

<input 
type="text" 
name="price" 
value="<?php echo $item['price']; ?>"
>


<br><br>


<label>
Description:
</label>

<textarea name="description"><?php echo $item['description']; ?></textarea>
<br><br>

<label>
Current Image:
</label>

<br>

<?php

if (!empty($item['image'])) {

?>

<img src="../uploads/<?php echo $item['image']; ?>" width="100">

<?php

}

?>

<br><br>


<label>
Replace Image:
</label>

<input type="file" name="image">

<br><br>


<button type="submit" name="update">
Save Changes
</button>


</form>


</main>


<?php

include "adminFooter.php";

?>