<?php
include 'koneksi.php';

$npm = $_GET['npm'];

// Hapus data mahasiswa dan relasinya di KRS
$conn->query("DELETE FROM krs WHERE mahasiswa_npm='$npm'");
$conn->query("DELETE FROM mahasiswa WHERE npm='$npm'");

header("Location: index.php");
?>
