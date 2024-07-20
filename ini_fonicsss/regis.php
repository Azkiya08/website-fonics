<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Periksa apakah password cocok dengan konfirmasi password
    if ($password != $confirm_password) {
        echo "Konfirmasi password tidak cocok.";
        exit();
    }

    // Periksa apakah username atau email sudah terdaftar sebelumnya
    $check_query = "SELECT * FROM user WHERE username='$username' OR email='$email'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        echo "<script>alert('Username atau Email sudah pernah didaftarkan!');</script>";
        // Redirect ke halaman utama setelah 2 detik
        echo "<script>setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
        exit();
    } else {
        // Enkripsi password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL untuk memasukkan data ke dalam database
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Registrasi berhasil, tampilkan pop-up
            echo "<script>alert('Registrasi berhasil!');</script>";
            // Redirect ke halaman utama setelah 2 detik
            echo "<script>setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<script>setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
        }
    }
}
?>
