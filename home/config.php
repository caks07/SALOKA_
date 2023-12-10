<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "saloka"; // Ganti $database_name menjadi $database

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
