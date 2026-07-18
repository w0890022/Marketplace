<?php
include "auth.php";
include "../includes/db.php";
include "adminHeader.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $condition_status = $_POST["condition_status"];
    $status = "Available";

    $image = $_FILES['image']['name'];

    $target = "../uploads/" . basename($image);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO items 
    (title, category, author, price, description, condition_status, image, status)

    VALUES

    ('$title', '$category', '$author', '$price', '$description', '$condition_status', '$image', '$status')";


   if ($conn->query($sql) === TRUE) {

    echo "Item added successfully!";
    echo "<br>ID created: " . $conn->insert_id;

} else {

    echo "Error: " . $conn->error;

}
}

?>

<main>

<h2>Add New Item</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Title:</label>
    <input type="text" name="title">

    <br><br>

    <label>Category:</label>
    <select name="category">
        <option value="Book">Book</option>
        <option value="Movie">Movie</option>
        <option value="Household">Household</option>
        <option value="Other">Other</option>
    </select>

    <br><br>

    <label>Author:</label>
    <input type="text" name="author">

    <br><br>

    <label>Price:</label>
    <input type="number" step="0.01" name="price">

    <br><br>

    <label>Description:</label>
    <textarea name="description"></textarea>

    <br><br>

    <label>Condition:</label>
    <input type="text" name="condition_status">

    <br><br>

    <label>Image:</label>
    <input type="file" name="image">

    <br><br>

    <button type="submit">
        Add Item
    </button>

</form>

</main>

<?php
include "../includes/footer.php";
?>