<?php
$host = 'localhost';
$username = 'id21995101_sheisfonics';
$password = 'Azkiya.08';
$database = 'id21995101_db';

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>
