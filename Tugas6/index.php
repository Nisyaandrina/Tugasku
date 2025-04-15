<?php
$bandara_asal = [
  "Soekarno Hatta" => 65000,
  "Husein Sastranegara" => 50000,
  "Abdul Rachman Saleh" => 40000,
  "Juanda" => 30000
];

$bandara_tujuan = [
  "Ngurah Rai" => 85000,
  "Hasanuddin" => 70000,
  "Inanwatan" => 90000,
  "Sultan Iskandar Muda" => 60000
];

ksort($bandara_asal);
ksort($bandara_tujuan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Rute Penerbangan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f4f8;
    }
    .card {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      border-radius: 1rem;
    }
    .btn-primary:hover {
      transform: scale(1.02);
      transition: 0.2s;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5 w-100" style="max-width: 600px;">
      <h2 class="text-center mb-4">Form Pendaftaran Rute Penerbangan</h2>
      <form action="proses.php" method="post">
        <div class="mb-3">
          <label class="form-label">Nama Maskapai</label>
          <input type="text" class="form-control" name="maskapai" required>
        </div>

        <!-- Bandara Asal -->
        <div class="mb-3">
          <label class="form-label">Bandara Asal</label>
          <select class="form-select" name="bandara_asal" required>
            <?php foreach ($bandara_asal as $bandara => $pajak): ?>
              <option value="<?= $bandara ?>"><?= $bandara ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Bandara Tujuan -->
        <div class="mb-3">
          <label class="form-label">Bandara Tujuan</label>
          <select class="form-select" name="bandara_tujuan" required>
            <?php foreach ($bandara_tujuan as $bandara => $pajak): ?>
              <option value="<?= $bandara ?>"><?= $bandara ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Harga Tiket -->
        <div class="mb-3">
          <label class="form-label">Harga Tiket</label>
          <input type="number" class="form-control" name="harga_tiket" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Hitung Total</button>
      </form>
    </div>
  </div>
</body>
</html>
