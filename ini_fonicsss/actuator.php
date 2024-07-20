<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

// Mengambil nilai-nilai dari tabel di database
$sql = "SELECT * FROM aktuator";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Simpan nilai-nilai dalam variabel
    while($row = $result->fetch_assoc()) {
        $pompa_a = $row['pompa_a'];
        $pompa_b = $row['pompa_b'];
        $pompa_ph_up = $row['pompa_ph_up'];
        $pompa_ph_down = $row['pompa_ph_down'];
        $fogger = $row['fogger'];
        $lampu = $row['lampu'];
        $kipas = $row['kipas'];
        
    }
} else {
    echo "Tidak ada data yang ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Fonics.id</span>
                    </a>
                </li>

                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
>
                
                <li>
                    <a href="actuator.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Actuator</span>
                    </a>
                </li>

                <li>
                    <a href="help.html">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="download.php">
                        <span class="icon">
                            <ion-icon name="download-outline"></ion-icon>
                        </span>
                        <span class="title">Download Report</span>
                    </a>
                    
                </li>
                <li>
                <a href="umur.php">
                        <span class="icon">
                            <ion-icon name="leaf-outline"></ion-icon>
                        </span>
                        <span class="title">Umur Tanaman</span>
                    </a>
                    
                </li>
                <li>
                    <a href="index.html">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                    
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>



                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->


            <!-- ================ Order Details List ================= -->
            <div class="details" id="actuator">
                <div class="recentOrders">


                <!-- ================= New Customers ================ -->

            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        $(document).ready(function() {
            const interval = setInterval(() => {
                $.ajax({
                    url: 'getdata.php', // Menggunakan getdata.php untuk memperbarui data
                    method: 'GET',
                    success: function(response) {
                        $('#actuator').html(response); // Mengganti isi #actuator dengan data terbaru
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }, 5000); // Setiap 5 detik
            return () => clearInterval(interval);
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
