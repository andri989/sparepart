<html>
<head>
	<title>Add Barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
	<a href="../index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Barang</td>
				<td><input type="text" name="nama_barang"></td>
			</tr>
			<tr> 
				<td>Harga Jual</td>
				<td><input type="text" name="harga_jual"></td>
			</tr>
			<tr> 
				<td>Harga Beli</td>
				<td><input type="text" name="harga_beli"></td>
			</tr>
			<tr> 
				<td>Satuan</td>
				<td><input type="text" name="satuan"></td>
			</tr>
			<tr> 
				<td>Kategori</td>
				<td><input type="text" name="kategori"></td>
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
		$nama_barang = $_POST['nama_barang'];
		$harga_jual = $_POST['harga_jual'];
		$harga_beli = $_POST['harga_beli'];
		$satuan = $_POST['satuan'];
		$kategori = $_POST['kategori'];
		
		// include database connection file
		include_once("../config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO barang(nama_barang, harga_jual, harga_beli, satuan, kategori) VALUES('$nama_barang','$harga_jual','$harga_beli','$satuan', '$kategori')");
		
		// Show message when user added
		echo "Barang Berhasil Ditambah. <a href='../index.php'>View Barang</a>";
	}
	?>
</body>
</html>