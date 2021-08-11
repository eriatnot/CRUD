<?php 
    include_once("koneksi.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
      <header>
            <style>

</style>
</head>
<body>

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

    </header>
    <center><h1>Data Produk</h1><center><p></p>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Keterangan</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM produk ORDER BY id_produk ASC";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }


      $no = 1; 

      while($row = mysqli_fetch_assoc($result))
      {
      ?>
        <div style="overflow-x:auto;">
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['keterangan'], 0, 20); ?>...</td>
          <td>Rp <?php echo number_format($row['harga'],0,',','.'); ?></td>
          <td><?php echo $row['jumlah']; ?></td>
          <td>
              <a href="edit.php?id_produk=<?php echo $row['id_produk']; ?>">Edit</a> |
              <a href="proses_hapus.php?id_produk=<?php echo $row['id_produk']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         </div>
       
      <?php
        $no++; 
      }
      ?>

    </tbody>
    </table>
  </body>
</html>