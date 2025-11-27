<?php
session_start();
include "config.php";
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);

    if(password_verify($password, $row['password'])){

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];

        header("Location: homepage.html");   
        exit();
    }
}

header("Location: login.html?error=1");
exit();
?>