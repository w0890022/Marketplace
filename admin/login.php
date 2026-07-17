<?php

session_start();

include "../includes/db.php";


if(isset($_POST['login'])) {


$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM admins WHERE username='$username'";

$result = $conn->query($sql);


if($result->num_rows == 1) {

    $admin = $result->fetch_assoc();

    if(password_verify($password, $admin['password'])) {

        $_SESSION['admin'] = $admin['username'];

        header("Location: inventory.php");
        exit();

    }

}


$error = "Invalid username or password";


}

?>


<h2>Admin Login</h2>


<?php

if(isset($error)) {

    echo $error;

}

?>


<form method="POST">

<label>
Username
</label>

<input type="text" name="username">


<br><br>


<label>
Password
</label>

<input type="password" name="password">


<br><br>


<button name="login">
Login
</button>

</form>