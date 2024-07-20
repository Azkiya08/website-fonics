<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

// Mengambil nilai-nilai dari tabel di database
$sql = "SELECT * FROM nilai";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Simpan nilai-nilai dalam variabel
    while($row = $result->fetch_assoc()) {
        $suhu = $row['suhu'];
        $kelembapan = $row['kelembapan'];
        $ph = $row['ph'];
        $nutrisi = $row['nutrisi'];
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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
            <!-- <div class="cardBox">
                <div class="card1">
                </div>
                <div class="card2">
                </div>
                <div class="card3">
                </div>
                <div class="card4">
                </div>
            </div> -->

            <!-- ================ Add Charts JS ================= -->
            <div class="container-chart" id="load-canvas">
            </div>

            <!-- ================ Order Details List ================= -->

        </div>
    </div>
    
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    
    <!-- ======= Charts JS ====== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <!-- =========== AJAX Refresh ========= -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const interval = setInterval(() => {
                $.ajax({
                    url: 'assets/js/newChart.php',
                    method: 'GET',
                    success: function(response) {
                        $('#load-canvas').html(response)
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                })
            }, 5000)
            return () => clearInterval(interval)
        })
    </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>


</html>