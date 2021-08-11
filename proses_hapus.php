<?php
include 'koneksi.php';
$id_produk = $_GET["id_produk"];

    $query = "DELETE FROM produk WHERE id_produk='$id_produk' ";
    $hasil_query = mysqli_query($koneksi, $query);

    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }