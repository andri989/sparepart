<html>
<head>
	<title>Add Barang</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
	<?php
		include_once("../config.php");
	?>

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

	<?php
		$result = mysqli_query($mysqli, "SELECT * FROM barang");
	?>

	<a href="../index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Tanggal Faktur</td>
				<td><input id="datepicker" class="form-control" name="tgl_faktur"></td>
			</tr>
			<tr> 
				<td>Nama Konsumen</td>
				<td><input type="text" class="form-control" name="nama_konsumen"></td>
			</tr>
			<tr> 
				<td>Kode Barang</td>
				<td>
				<select name="kode_barang" class="form-control">
					<?php 
						$ambilsemuadatanya = mysqli_query($mysqli, "SELECT * FROM barang");
						while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
							$namabarangnya = $fetcharray['nama_barang'];
							$kode_barang = $fetcharray['kode_barang'];
					?>

					<option value="<?= $kode_barang; ?>"><?= $namabarangnya; ?></option>

					<?php
						}
					?>
				</select>
				</td>
			</tr>
			<tr> 
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah"></td>
			</tr>
			<tr> 
				<td>Harga Satuan</td>
				<td><input type="text" class="form-control" name="harga_satuan"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$tgl_faktur = $_POST['tgl_faktur'];
			$nama_konsumen = $_POST['nama_konsumen'];
			$kode_barang = $_POST['kode_barang'];
			$jumlah = $_POST['jumlah'];
			$harga_satuan = $_POST['harga_satuan'];
			
			// include database connection file
			include_once("../config.php");
					
			// Insert user data into table
			$result = mysqli_query($mysqli, "INSERT INTO penjualan(tgl_faktur, nama_konsumen, kode_barang, jumlah, harga_satuan) VALUES('$tgl_faktur','$nama_konsumen','$kode_barang','$jumlah', '$harga_satuan')");
			
			// Show message when user added
			echo "Barang Berhasil Ditambah. <a href='index.php'>View Penjualan</a>";
		}
	?>

	

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
	$('#datepicker').datepicker({
	});
</script>
</body>
</html>