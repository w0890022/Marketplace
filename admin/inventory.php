<?php
include "auth.php";
include "../includes/db.php";
include "adminHeader.php";

?>


<main>

<h2>Inventory Management</h2>

<table>

<tr>

    <th>Image</th>
    <th>Title</th>
    <th>Category</th>
    <th>Price</th>
    <th>Status</th>
    <th>Actions</th>

</tr>


<?php

$sql = "SELECT * FROM items";

$result = $conn->query($sql);


if ($result->num_rows > 0) {


    while($item = $result->fetch_assoc()) {


?>


<tr>

<td>

<?php

if (!empty($item['image'])) {

?>

<img src="../uploads/<?php echo $item['image']; ?>" width="80">

<?php

}

?>

</td>


<td>

<?php echo $item['title']; ?>

</td>


<td>

<?php echo $item['category']; ?>

</td>


<td>

$<?php echo $item['price']; ?>

</td>


<td>

<?php echo $item['status']; ?>

</td>


<td class="actions">

<a class="edit-btn" href="editItem.php?id=<?php echo $item['id']; ?>">
    Edit
</a>


<a class="status-btn" href="markSold.php?id=<?php echo $item['id']; ?>">

<?php

if ($item['status'] == "Available") {

    echo "Mark Sold";

} else {

    echo "Mark Available";

}

?>

</a>


<a class="delete-btn" 
href="deleteItem.php?id=<?php echo $item['id']; ?>"
onclick="return confirm('Are you sure you want to delete this item?');">

    Delete

</a>

</td>


</tr>


<?php


    }

}

else {

echo "<tr><td colspan='6'>No items found.</td></tr>";

}


?>


</table>


</main>


<?php

include "adminFooter.php";

?>