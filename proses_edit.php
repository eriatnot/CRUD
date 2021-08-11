<?php
include 'koneksi.php';

  $id_produk = $_POST['id_produk'];
  $nama_produk   = $_POST['nama_produk'];
  $keterangan    = $_POST['keterangan'];
  $harga     = $_POST['harga'];
  $jumlah = $_POST['jumlah'];


                      
    $query  = "UPDATE produk SET nama_produk = '$nama_produk', keterangan = '$keterangan', harga = '$harga',  jumlah = 'jumlah'";
    $query .= "WHERE id_produk = '$id_produk'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
              " - ".mysqli_error($koneksi));
    } else {
      $query  = "UPDATE produk SET nama_produk = '$nama_produk', keterangan = '$keterangan', harga = '$harga', jumlah ='$jumlah'";
      $query .= "WHERE id_produk = '$id_produk'";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }
