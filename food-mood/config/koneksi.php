<?php
$conn = mysqli_connect("localhost", "root", "", "food_mood_db");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>