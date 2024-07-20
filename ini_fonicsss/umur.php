<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

// Proses data form jika ada data yang di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tanaman = $_POST['id_tanaman'];
    $nama_tanaman = $_POST['nama_tanaman'];
    $tanggal_tanam = $_POST['tanggal_tanam'];
    $tanggal_panen = $_POST['tanggal_panen'];

    $sql = "INSERT INTO tanaman (id_tanaman,nama_tanaman, tanggal_tanam, tanggal_panen) VALUES ('$id_tanaman','$nama_tanaman', '$tanggal_tanam', '$tanggal_panen')";

    if ($conn->query($sql) === TRUE) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "<script>alert('$message');</script>";
}

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
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .alert {
            display: none;
            margin-top: 20px;
        }
    </style>
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
            <div class="cardHeader">
                <a href="#" class="btn" id="btnTambahData">Tambah Data</a>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details" id="umur">
                <div class="recentOrders">
                    <!-- ================= New Customers ================ -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="tambahDataForm" action="" method="post">
                <label for="id_tanaman">ID Tanaman:</label>
                <input type="text" id="id_tanaman" name="id_tanaman" required><br><br>
                <label for="nama_tanaman">Nama Tanaman:</label>
                <input type="text" id="nama_tanaman" name="nama_tanaman" required><br><br>
                <label for="tanggal_tanam">Tanggal Tanam:</label>
                <input type="date" id="tanggal_tanam" name="tanggal_tanam" required><br><br>
                <label for="tanggal_panen">Tanggal Panen:</label>
                <input type="date" id="tanggal_panen" name="tanggal_panen" required><br><br>
                <input type="submit" value="Submit">
            </form>
            <div class="alert" id="alert"></div>
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
                    url: 'getumur.php', // Menggunakan getdata.php untuk memperbarui data
                    method: 'GET',
                    success: function(response) {
                        $('#umur').html(response); // Mengganti isi #actuator dengan data terbaru
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }, 5000); // Setiap 5 detik
            return () => clearInterval(interval);
        });

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("btnTambahData");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
