<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

// Memeriksa apakah permintaan datang dari metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Melakukan query untuk mencari pengguna dengan email yang cocok
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Pengguna ditemukan
        $row = $result->fetch_assoc();
        // Memeriksa kecocokan password
        if (password_verify($password, $row['password'])) {
            // Login berhasil
            // Redirect ke halaman utama setelah 2 detik
            echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 2000);</script>";
            // Redirect atau lakukan tindakan selanjutnya di sini
        } else {
            // Password tidak cocok
            echo "Password salah!";
        }
    } else {
        // Pengguna tidak ditemukan
        echo "Email tidak terdaftar!";
    }
}
?>
