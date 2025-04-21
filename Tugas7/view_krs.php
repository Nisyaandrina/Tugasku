<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .keterangan span.nama { color: #dc3545; font-weight: bold; }
        .keterangan span.matkul { color: #6f42c1; font-weight: bold; }
    </style>
</head>
<body class="container mt-5">
    <h3>Data KRS Mahasiswa</h3>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali ke Daftar Mahasiswa</a>
    <table class="table table-striped">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT 
                    m.nama AS nama_mhs, 
                    mk.nama AS nama_mk, 
                    mk.jumlah_sks AS sks
                FROM krs
                JOIN mahasiswa m ON m.npm = krs.mahasiswa_npm
                JOIN matakuliah mk ON mk.kodemk = krs.matakuliah_kodemk
                ORDER BY m.nama ASC";

        $result = $conn->query($sql);
        $no = 1;

        while ($row = $result->fetch_assoc()) {
            $nama = htmlspecialchars($row['nama_mhs']);
            $matkul = htmlspecialchars($row['nama_mk']);
            $sks = $row['sks'];

            echo "<tr>
                    <td>$no</td>
                    <td>$nama</td>
                    <td>$matkul</td>
                    <td class='keterangan'>
                        <span class='nama'>$nama</span> Mengambil Mata Kuliah 
                        <span class='matkul'>$matkul</span> ($sks SKS)
                    </td>
                </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>
