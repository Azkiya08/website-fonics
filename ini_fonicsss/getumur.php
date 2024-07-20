<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

// Fungsi untuk menghapus data
if (isset($_GET['delete_id'])) {
    $id_tanaman = $_GET['delete_id'];
    
    // Buat query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM tanaman WHERE id_tanaman = ?";
    
    // Gunakan prepared statement untuk mencegah SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $id_tanaman);
        
        if ($stmt->execute()) {
            // Jika penghapusan berhasil, kembali ke halaman utama
            header("Location: umur.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

// Ambil data dari tabel tanaman
$sql = "SELECT * FROM tanaman";
$result = $conn->query($sql);

$tabelData = '';
if ($result->num_rows > 0) {
    // Simpan nilai-nilai dalam variabel
    while($row = $result->fetch_assoc()) {
        $tanggalTanam = new DateTime($row['tanggal_tanam']);
        $tanggalSekarang = new DateTime();
        $tanggalPanen = new Datetime($row['tanggal_panen']);
        $umurTanaman = $tanggalSekarang->diff($tanggalTanam)->format('%y tahun, %m bulan, %d hari');
        $estimasi_panen = $tanggalPanen->diff($tanggalTanam)->format('%y tahun, %m bulan, %d hari');
        
        $tabelData .= '<tr>';
        $tabelData .= '<td>' . $row['id_tanaman'] . '</td>';
        $tabelData .= '<td>' . $row['nama_tanaman'] . '</td>';
        $tabelData .= '<td>' . $row['tanggal_tanam'] . '</td>';
        $tabelData .= '<td>' . $row['tanggal_panen'] . '</td>';
        $tabelData .= '<td>' . $umurTanaman . '</td>';
        $tabelData .= '<td>' . $estimasi_panen . '</td>';
        $tabelData .= '<td>
                          
                          <a href="getumur.php?delete_id=' . $row['id_tanaman'] . '" class="btn" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Delete</a>
                       </td>';
        $tabelData .= '</tr>';
    }
} else {
    $tabelData .= '<tr><td colspan="6">Tidak ada data yang ditemukan.</td></tr>';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonics.id | Azkiya's project</title>
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="details" id="umur">
    <div class="recentOrders">
      <!-- Actuator Status Table -->
      <div class="cardHeader">
        <h2>Tanaman</h2>
        
      </div>
      <table>
        <thead>
          <tr>
            <td>ID Tanaman</td>
            <td>Nama Tanaman</td>
            <td>Tanggal Penanaman</td>
            <td>Tanggal Panen</td>
            <td>Umur Tanaman</td>
            <td>Estimasi Panen</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <?php echo $tabelData; ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
