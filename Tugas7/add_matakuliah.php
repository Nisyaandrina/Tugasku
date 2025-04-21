<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>Tambah Mata Kuliah</h3>
    <form method="post" action="">
        <div class="mb-3">
            <label>Kode MK</label>
            <input type="text" name="kodemk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah SKS</label>
            <input type="number" name="jumlah_sks" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $kodemk = $_POST['kodemk'];
        $nama = $_POST['nama'];
        $jumlah_sks = $_POST['jumlah_sks'];

        $sql = "INSERT INTO matakuliah VALUES('$kodemk', '$nama', '$jumlah_sks')";
        if ($conn->query($sql)) {
            echo "<div class='alert alert-success mt-3'>Mata kuliah berhasil ditambahkan.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menambahkan: " . $conn->error . "</div>";
        }
    }
    ?>
</body>
</html>
