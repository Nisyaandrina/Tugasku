<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>Tambah Mahasiswa</h3>
    <form method="post" action="">
        <div class="mb-3">
            <label>NPM</label>
            <input type="text" name="npm" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO mahasiswa VALUES('$npm', '$nama', '$jurusan', '$alamat')";
        if ($conn->query($sql)) {
            echo "<div class='alert alert-success mt-3'>Data mahasiswa berhasil ditambahkan.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menambahkan: " . $conn->error . "</div>";
        }
    }
    ?>
</body>
</html>
