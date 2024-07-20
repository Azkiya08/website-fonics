<?php
$koneksi = mysqli_connect("localhost","id21995101_sheisfonics","Azkiya.08","id21995101_db");
$kelembapan_result = mysqli_query($koneksi, "SELECT kelembapan FROM (SELECT * FROM nilai ORDER BY id_nilai DESC LIMIT 10) AS latest_data ORDER BY id_nilai ASC");
$suhu_result = mysqli_query($koneksi, "SELECT suhu FROM (SELECT * FROM nilai ORDER BY id_nilai DESC LIMIT 10) AS latest_data ORDER BY id_nilai ASC");
$ph_result = mysqli_query($koneksi, "SELECT ph FROM (SELECT * FROM nilai ORDER BY id_nilai DESC LIMIT 10) AS latest_data ORDER BY id_nilai ASC");
$nutrisi_result = mysqli_query($koneksi, "SELECT nutrisi FROM (SELECT * FROM nilai ORDER BY id_nilai DESC LIMIT 10) AS latest_data ORDER BY id_nilai ASC");
$waktu_result = mysqli_query($koneksi, "SELECT waktu FROM (SELECT * FROM nilai ORDER BY id_nilai DESC LIMIT 10) AS latest_data ORDER BY id_nilai ASC");

$kelembapan_data = [];
while ($p = mysqli_fetch_array($kelembapan_result)) {
    $kelembapan_data[] = $p['kelembapan'];
}

$suhu_data = [];
while ($p = mysqli_fetch_array($suhu_result)) {
    $suhu_data[] = $p['suhu'];
}

$ph_data = [];
while ($p = mysqli_fetch_array($ph_result)) {
    $ph_data[] = $p['ph'];
}

$nutrisi_data = [];
while ($p = mysqli_fetch_array($nutrisi_result)) {
    $nutrisi_data[] = $p['nutrisi'];
}

$waktu_labels = [];
while ($p = mysqli_fetch_array($waktu_result)) {
    $waktu_labels[] = $p['waktu'];
}

$time = time();

$sql = "SELECT * FROM nilai";
$result = mysqli_query($koneksi, $sql);

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $suhu; ?></div>
                        <div class="cardName">Suhu</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="snow-outline"></ion-icon>
                    </div>
                </div>
        
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $kelembapan; ?></div>
                        <div class="cardName">Kelembapan</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="water-outline"></ion-icon>
                    </div>
                </div>
        
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $ph; ?></div>
                        <div class="cardName">pH</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="speedometer-outline"></ion-icon>
                    </div>
                </div>
        
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $nutrisi; ?></div>
                        <div class="cardName">Nutrisi</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="logo-react"></ion-icon>
                    </div>
                </div>
            </div>
</div>
<div class="chartsBx" id="load-canvas">
<div class="chart"><canvas id="chart-1"></canvas></div>
<div class="chart"><canvas id="chart-2"></canvas></div>
<div class="chart"><canvas id="chart-3"></canvas></div>
<div class="chart"><canvas id="chart-4"></canvas></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script>
    const ctx1<?= $time ?> = document.getElementById("chart-1").getContext("2d");
    const myChart1<?= $time ?> = new Chart(ctx1<?= $time ?>, {
        type: "line",
        data: {
            labels: [<?php echo '"' . implode('", "', $waktu_labels) . '"'; ?>],
            datasets: [
            {
                label: "Suhu",
                data: [<?php echo '"' . implode('", "', $suhu_data) . '"'; ?>],
                backgroundColor: [
                "rgba(54, 162, 235, 1)",
                ],
            },
            ],
        },
        options: {
            responsive: true,
            animation: {
                duration: 5000
            }
        }
    })

    const ctx2<?= $time ?> = document.getElementById("chart-2").getContext("2d");
    const myChart2<?= $time ?> = new Chart(ctx2<?= $time ?>, {
        type: "line",
        data: {
            labels: [<?php echo '"' . implode('", "', $waktu_labels) . '"'; ?>],
            datasets: [
            {
                label: "Kelembapan",
                data: [<?php echo '"' . implode('", "', $kelembapan_data) . '"'; ?>],
                backgroundColor: [
                "rgba(255, 99, 132, 1)",
                ],
            },
            ],
        },
        options: {
            responsive: true,
            animation: {
                duration: 5000
            }
        }
    })

    const ctx3<?= $time ?> = document.getElementById("chart-3").getContext("2d");
    const myChart3<?= $time ?> = new Chart(ctx3<?= $time ?>, {
        type: "line",
        data: {
            labels: [<?php echo '"' . implode('", "', $waktu_labels) . '"'; ?>],
            datasets: [
            {
                label: "pH",
                data: [<?php echo '"' . implode('", "', $ph_data) . '"'; ?>],
                backgroundColor: [
                "RGBA( 0, 100, 0, 1 )",
                ],
            },
            ],
        },
        options: {
            responsive: true,
            animation: {
                duration: 5000
            }
        }
    })

    const ctx4<?= $time ?> = document.getElementById("chart-4").getContext("2d");
    const myChart4<?= $time ?> = new Chart(ctx4<?= $time ?>, {
        type: "line",
        data: {
            labels: [<?php echo '"' . implode('", "', $waktu_labels) . '"'; ?>],
            datasets: [
            {
                label: "Nutrisi",
                data: [<?php echo '"' . implode('", "', $nutrisi_data) . '"'; ?>],
                backgroundColor: [
                "rgba( 138, 43, 226, 1 )",
                ],
            },
            ],
        },
        options: {
            responsive: true,
            animation: {
                duration: 5000
            }
        }
    })
</script>

</body>
</html>