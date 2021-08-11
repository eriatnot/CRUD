<?php
include 'koneksi.php';

  if (isset($_GET['id_produk'])) {
    $id_produk = ($_GET["id_produk"]);


    $query = "SELECT * FROM produk WHERE id_produk='$id_produk'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tid_produkak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id_produk.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
      <head>
          <header>
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active">Home</a>
            <a href="tambah.php">Tambah Produk</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
      </head>
      <center>
        <h1>Edit Produk <?php echo $data['nama_produk']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id_produk" value="<?php echo $data['id_produk']; ?>"  hidden />
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Keterangan</label>
         <input type="text" name="keterangan" required=""value="<?php echo $data['keterangan']; ?>" />
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga" value="<?php echo $data['harga']; ?>" />
        </div>
        <div>
          <label>jumlah</label>
         <input type="text" name="jumlah" required=""value="<?php echo $data['jumlah']; ?>" />
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>