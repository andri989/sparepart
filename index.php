<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY kode_barang DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Barang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="penjualan/index.php">Penjualan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <br/><a href="barang/add.php">Add New Barang</a>
    
    <table class="table" width='100%' border=1>

    <tr>
        <th>Kode Barang</th> 
        <th>Nama Barang</th> 
        <th>Harga Jual</th> 
        <th>Harga Beli</th>
        <th>Satuan</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    <?php
    while($data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data['kode_barang']."</td>";
        echo "<td>".$data['nama_barang']."</td>";
        echo "<td>".$data['harga_jual']."</td>";
        echo "<td>".$data['harga_beli']."</td>";
        echo "<td>".$data['satuan']."</td>";
        echo "<td>".$data['kategori']."</td>";
        echo "<td><a href='barang/edit.php?kode_barang=$data[kode_barang]'>Edit</a> | <a href='barang/delete.php?kode_barang=$data[kode_barang]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>