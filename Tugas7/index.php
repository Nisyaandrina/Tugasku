<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="container py-5">
    <h2 class="text-center mb-3">
        <i class="bi bi-person-lines-fill"></i> Data Mahasiswa
    </h2>
    <p class="text-center text-muted mb-4">Kelola data mahasiswa, mata kuliah, dan KRS</p>

    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
        <a href="add_mahasiswa.php" class="btn btn-maroon">
            <i class="bi bi-person-plus-fill"></i> Tambah Mahasiswa
        </a>
        <a href="add_matakuliah.php" class="btn btn-warning text-white">
            <i class="bi bi-journal-plus"></i> Tambah Mata Kuliah
        </a>
        <a href="add_krs.php" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah KRS
        </a>
        <a href="view_krs.php" class="btn btn-dark">
            <i class="bi bi-book"></i> Lihat Data KRS
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM mahasiswa");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['npm']) . "</td>
                        <td>" . htmlspecialchars($row['nama']) . "</td>
                        <td>" . htmlspecialchars($row['jurusan']) . "</td>
                        <td>" . htmlspecialchars($row['alamat']) . "</td>
                        <td class='action-buttons'>
                            <a href='edit_mahasiswa.php?npm=" . urlencode($row['npm']) . "' class='btn btn-sm btn-warning'>
                                <i class='bi bi-pencil'></i> Edit
                            </a>
                            <a href='delete_mahasiswa.php?npm=" . urlencode($row['npm']) . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin hapus?')\">
                                <i class='bi bi-trash'></i> Hapus
                            </a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="text-center mt-5">
        <hr>
        <small>Sistem Akademik • Tugas 7 PBW &copy; 2025</small>
    </footer>
</body>
</html>
