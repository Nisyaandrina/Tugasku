<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h3>Tambah Data KRS</h3>
    <form method="post" action="">
        <div class="mb-3">
            <label>Mahasiswa</label>
            <select name="mahasiswa_npm" class="form-control" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php
                $result = $conn->query("SELECT * FROM mahasiswa");
                while ($m = $result->fetch_assoc()) {
                    echo "<option value='{$m['npm']}'>{$m['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="matakuliah_kodemk" class="form-control" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php
                $result = $conn->query("SELECT * FROM matakuliah");
                while ($mk = $result->fetch_assoc()) {
                    echo "<option value='{$mk['kodemk']}'>{$mk['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $npm = $_POST['mahasiswa_npm'];
        $kodemk = $_POST['matakuliah_kodemk'];

        $sql = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES('$npm', '$kodemk')";
        if ($conn->query($sql)) {
            echo "<div class='alert alert-success mt-3'>Data KRS berhasil ditambahkan.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal menambahkan: " . $conn->error . "</div>";
        }
    }
    ?>
</body>
</html>
