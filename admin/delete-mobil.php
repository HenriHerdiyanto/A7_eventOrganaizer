<?php
include "header.php";
$id = $_GET['id'];
$sql = "DELETE FROM mobil WHERE id_mobil = '$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    echo "<script>alert('Data berhasil dihapus');window.location='daftar-mobil.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');window.location='daftar-mobil.php';</script>";
}
