<?php
$maskapai = $_POST['maskapai'];
$asal = $_POST['bandara_asal'];
$tujuan = $_POST['bandara_tujuan'];
$harga = $_POST['harga_tiket'];

// Pajak bandara asal
$pajak_asal = [
  "Soekarno Hatta" => 65000,
  "Husein Sastranegara" => 50000,
  "Abdul Rachman Saleh" => 40000,
  "Juanda" => 30000
];

// Pajak bandara tujuan
$pajak_tujuan = [
  "Ngurah Rai" => 85000,
  "Hasanuddin" => 70000,
  "Inanwatan" => 90000,
  "Sultan Iskandar Muda" => 60000
];

// Validasi: cek apakah bandara tersedia
$pajak_asal_val = isset($pajak_asal[$asal]) ? $pajak_asal[$asal] : 0;
$pajak_tujuan_val = isset($pajak_tujuan[$tujuan]) ? $pajak_tujuan[$tujuan] : 0;

$pajak_total = $pajak_asal_val + $pajak_tujuan_val;
$total_harga = $harga + $pajak_total;

$tanggal = date("d-m-Y");
$nomor = rand(100000, 999999);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hasil Perhitungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-radius: 1rem;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5 w-100" style="max-width: 600px;">
      <h2 class="text-center mb-4">Detail Penerbangan</h2>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Nomor:</strong> <?= $nomor ?></li>
        <li class="list-group-item"><strong>Tanggal:</strong> <?= $tanggal ?></li>
        <li class="list-group-item"><strong>Nama Maskapai:</strong> <?= $maskapai ?></li>
        <li class="list-group-item"><strong>Asal:</strong> <?= $asal ?></li>
        <li class="list-group-item"><strong>Tujuan:</strong> <?= $tujuan ?></li>
        <li class="list-group-item"><strong>Harga Tiket:</strong> Rp <?= number_format($harga, 0, ',', '.') ?></li>
        <li class="list-group-item"><strong>Total Pajak:</strong> Rp <?= number_format($pajak_total, 0, ',', '.') ?></li>
        <li class="list-group-item"><strong>Total Bayar:</strong> Rp <?= number_format($total_harga, 0, ',', '.') ?></li>
      </ul>
      <div class="text-center mt-4">
        <a href="index.php" class="btn btn-outline-primary">Kembali ke Form</a>
      </div>
    </div>
  </div>
</body>
</html>
