<?php
// Sertakan file koneksi ke database di sini
include 'config.php';

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
        $aerator = $row['aerator'];
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
    <title>Fonics.id | Azkiya's project</title>
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="details" id="actuator">
    <div class="recentOrders">
      <!-- Actuator Status Table -->
      <div class="cardHeader">
        <h2>Kondisi Aktuator</h2>

      </div>
      <table>
        <thead>
          <tr>
            <td>Name</td>
            <td>Status</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Pompa A Mix</td>
            <td><span class="status <?php echo $pompa_a == 0 ? 'on' : 'off'; ?>"><?php echo $pompa_a == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
          <tr>
            <td>Pompa B Mix</td>
            <td><span class="status <?php echo $pompa_b == 0 ? 'on' : 'off'; ?>"><?php echo $pompa_b == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
          <tr>
            <td>Pompa pH Up</td>
            <td><span class="status <?php echo $pompa_ph_up == 0 ? 'on' : 'off'; ?>"><?php echo $pompa_ph_up == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
          <tr>
            <td>Pompa pH Down</td>
            <td><span class="status <?php echo $pompa_ph_down == 0 ? 'on' : 'off'; ?>"><?php echo $pompa_ph_down == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
          <tr>
            <td>Fogger Ultrasonik</td>
            <td><span class="status <?php echo $fogger == 0 ? 'on' : 'off'; ?>"><?php echo $fogger == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
          <tr>
            <td>Lampu LED</td>
            <td><span class="status <?php echo $lampu == 0 ? 'on' : 'off'; ?>"><?php echo $lampu == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
          <tr>
            <td>Kipas DC</td>
            <td><span class="status <?php echo $kipas == 0 ? 'on' : 'off'; ?>"><?php echo $kipas == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
                    <tr>
            <td>Aerator</td>
            <td><span class="status <?php echo $aerator == 0 ? 'on' : 'off'; ?>"><?php echo $aerator == 0 ? 'on' : 'off'; ?></span></td>
          </tr>
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
