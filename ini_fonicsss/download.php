<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

// Output headers to force the browser to download the file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="nilai_data.csv"');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Database connection
$koneksi = mysqli_connect("localhost", "id21995101_sheisfonics", "Azkiya.08", "id21995101_db");

// Fetch data from the "nilai" table
$query = "SELECT * FROM nilai";
$result = mysqli_query($koneksi, $query);

// Output the column headings for "nilai" table
$columns_nilai = array("id_nilai", "waktu", "kelembapan","suhu","ph","nutrisi"); // Replace with your actual column names
fputcsv($output, $columns_nilai);

// Output data from the "nilai" table
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

// Fetch data from the "aktuator" table
$query_aktuator = "SELECT * FROM aktuator";
$result_aktuator = mysqli_query($koneksi, $query_aktuator);

// Output the column headings for "aktuator" table
$columns_aktuator = array("pompa_a", "pompa_b", "pompa_ph_up","pompa_ph_down", "fogger", "lampu","kipas", "aerator"); // Replace with your actual column names
fputcsv($output, $columns_aktuator);

// Output data from the "aktuator" table
while ($row = mysqli_fetch_assoc($result_aktuator)) {
    fputcsv($output, $row);
}

// Close the file pointer
fclose($output);

// Close the database connection
mysqli_close($koneksi);
?>


