<?php
$server = "localhost"; // Server
$user = "root"; //Your User 
$pass = "";//Your Pasword
$db = "book_schedule"; //Your Database;

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Fail: " . mysqli_connect_error());
}
?>
