<?php 

$server = "localhost";
$user = "Chethan";
$pass = "1234";
$database = "test";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>