<?php
include 'koneksi.php';
$npm = $_GET['npm'];
$mahasiswa = $conn->query("SELECT * FROM mahasiswa WHERE npm='$npm'")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>Edit Mahasiswa</h3>
    <form method="post" action="">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $mahasiswa['nama'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option <?= $mahasiswa['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                <option <?= $mahasiswa['jurusan'] == 'Sistem Operasi' ? 'selected' : '' ?>>Sistem Operasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $mahasiswa['alamat'] ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";
        if ($conn->query($sql)) {
            echo "<div class='alert alert-success mt-3'>Data berhasil diupdate.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal mengupdate: " . $conn->error . "</div>";
        }
    }
    ?>
</body>
</html>
