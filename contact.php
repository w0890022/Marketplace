<?php
include "includes/header.php";

$item = "";

if (isset($_GET['item'])) {
    $item = $_GET['item'];
}

?>

<main>

<h2>Contact</h2>

<?php if ($item != "") { ?>

<p>
You are interested in:
<strong><?php echo htmlspecialchars($item); ?></strong>
</p>

<?php } ?>

<p>
All items are available for local pickup only.
</p>

<p>
If you are interested in an item, please contact me using the details below.
</p>

<h3>Contact Information</h3>

<p>
<strong>Email:</strong>
samanthaltoye@gmail.com
</p>

<p>
<strong>Pickup Location:</strong>
Local pickup in Windsor, Ontario
</p>

<p>
Please include the item name you are interested in when contacting me.
</p>

</main>

<?php
include "includes/footer.php";
?>