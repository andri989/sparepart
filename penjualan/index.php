<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM penjualan ORDER BY kode_barang DESC");
?>
 
<html>
<head>    
    <title>Penjualan</title>
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
          <a class="nav-link active" aria-current="page" href="../index.php">Barang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Penjualan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">

    <a href="add.php">Add New Penjualan</a><br/><br/>
 
    <table width='100%' border=1>
 
    <tr>
        <th>Tanggal Faktur</th> 
        <th>No Faktur</th> 
        <th>Nama Konsumen</th> 
        <th>Kode Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Aksi</th>
    </tr>
    <?php
    while($data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$data['tgl_faktur']."</td>";
        echo "<td>".$data['no_faktur']."</td>";
        echo "<td>".$data['nama_konsumen']."</td>";
        echo "<td>".$data['kode_barang']."</td>";
        echo "<td>".$data['jumlah']."</td>";
        echo "<td>".$data['harga_satuan']."</td>";
        echo "<td><a href='edit.php?no_faktur=$data[no_faktur]'>Edit</a> | <a href='delete.php?no_faktur=$data[no_faktur]'>Delete</a></td></tr>";        
    }
    ?>
    </table>

    
</div>
</body>
</html>