<?php

include "includes/db.php";
include "includes/header.php";

?>

<main>

<h2>Available Items</h2>
<form method="GET" class="search-form">

    <input 
        type="text" 
        name="search" 
        placeholder="Search items..."
    >

    <button type="submit">
        Search
    </button>
<br><br>

<label for="category">Category:</label>

<select name="category">

    <option value="">All Items</option>

    <option value="Book">Books</option>

    <option value="Movie">Movies</option>

    <option value="Household">Household</option>

    <option value="Other">Other</option>

</select>
<br><br>
<a href="books.php">
    Clear Filters
</a>
</form>

<div class="book-container">

<?php

$search = "";
$category = "";


$sql = "SELECT * FROM items WHERE status='Available'";

if (isset($_GET['search']) && $_GET['search'] != "") {

    $search = $_GET['search'];

    $sql .= " AND (
        title LIKE '%$search%'
        OR author LIKE '%$search%'
        OR category LIKE '%$search%'
    )";

}


if (isset($_GET['category']) && $_GET['category'] != "") {

    $category = $_GET['category'];

    $sql .= " AND category = '$category'";

}
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($item = $result->fetch_assoc()) {

?>

    <div class="book-card">
<?php

if (!empty($item['image'])) {

?>

    <img src="uploads/<?php echo $item['image']; ?>" 
         alt="<?php echo $item['title']; ?>">

<?php

}

?>

        <h3>
            <?php echo $item['title']; ?>
        </h3>

        <p>
            <strong>Author:</strong>
            <?php echo $item['author']; ?>
        </p>

        <p>
            <strong>Category:</strong>
            <?php echo $item['category']; ?>
        </p>

        <p>
            <?php echo $item['description']; ?>
        </p>

        <h4>
            $<?php echo $item['price']; ?>
        </h4>

<p class="status <?php echo strtolower($item['status']); ?>">
    <?php echo $item['status']; ?>
</p>

    </div>


<?php

    }

} else {

    echo "<p>No available items right now.
Check back soon!</p>";

}

?>

</div>

</main>


<?php

include "includes/footer.php";

?>
