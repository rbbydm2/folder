<?php
// Contoh koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pci';

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
 die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Query SQL untuk mengambil data dari customer_summary
$query = "SELECT id_customer, customer, verified, goingtoexpire, expired FROM tabel_status";
$result = $koneksi->query($query);

// Inisialisasi array untuk menyimpan data
$data = [];

while ($row = $result->fetch_assoc()) {
 $data[] = $row;
}

// Tutup koneksi ke database
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <title>Grafik Tumpukan</title>

 <!-- Sertakan Chart.js -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
 <canvas id="myChart" width="100%" height="55%"></canvas>

 <script>
 // Ambil data dari PHP dan simpan dalam variabel JavaScript
 var data = <?php echo json_encode($data); ?>;

 // Persiapkan data untuk grafik
 var labels = data.map(function(item) {
  return item.id_customer;
 });
 var verified = data.map(function(item) {
  return item.verified;
 });
 var goingToExpire = data.map(function(item) {
  return item.goingtoexpire;
 });
 var expired = data.map(function(item) {
  return item.expired;
 });

 // Membuat grafik tumpukan
 var ctx = document.getElementById('myChart').getContext('2d');
 var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
   labels: labels,
   datasets: [{
     label: 'Verified',
     data: verified,
     borderColor: "green",
     borderWidth: 2,
     backgroundColor: 'rgba(0, 247, 0, 0.5)'
    },
    {
     label: 'Going to Expire',
     data: goingToExpire,
     borderColor: "yellow",
     borderWidth: 2,
     backgroundColor: 'rgba(247, 247, 0, 0.5)'
    },
    {
     label: 'Expired',
     data: expired,
     borderColor: "red",
     borderWidth: 2,
     backgroundColor: 'rgba(247, 0, 0, 0.5)'
    }
   ]
  },
  options: {
   responsive: true,
   tooltips: {
    intersect: false,
    node: "index",
   },
   scales: {
    x: {
     stacked: true
    },
    y: {
     stacked: true
    }
   }
  }
 });
 </script>
</body>

</html>