<?php
include "header.php";
$id = $_GET['id'];
$sql = "DELETE FROM event WHERE id_event = '$id'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    echo "<script>alert('Data berhasil dihapus');window.location='daftar-event.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');window.location='daftar-event.php';</script>";
}
