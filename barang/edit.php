<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$kode_barang = $_POST['kode_barang'];
	$nama_barang=$_POST['nama_barang'];
	$harga_jual=$_POST['harga_jual'];
	$harga_beli=$_POST['harga_beli'];
	$satuan=$_POST['satuan'];
	$kategori=$_POST['kategori'];
		
	$result = mysqli_query($mysqli, "UPDATE barang SET nama_barang='$nama_barang', harga_jual='$harga_jual',harga_beli='$harga_beli', satuan='$satuan', kategori='$kategori' WHERE kode_barang=$kode_barang");
	
	header("Location: ../index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$kode_barang = $_GET['kode_barang'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM barang WHERE kode_barang=$kode_barang");
 
while($user_data = mysqli_fetch_array($result))
{
	$nama_barang = $user_data['nama_barang'];
	$harga_jual = $user_data['harga_jual'];
	$harga_beli = $user_data['harga_beli'];
	$satuan = $user_data['satuan'];
	$kategori = $user_data['kategori'];
}
?>
<html>
<head>	
	<title>Edit Barang Data</title>
</head>
 
<body>
	<a href="../index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Barang</td>
				<td><input type="text" name="nama_barang" value=<?php echo $nama_barang;?>></td>
			</tr>
			<tr> 
				<td>Harga Jual</td>
				<td><input type="text" name="harga_jual" value=<?php echo $harga_jual;?>></td>
			</tr>
			<tr> 
				<td>Harga Beli</td>
				<td><input type="text" name="harga_beli" value=<?php echo $harga_beli;?>></td>
			</tr>
			<tr> 
				<td>Satuan</td>
				<td><input type="text" name="satuan" value=<?php echo $satuan;?>></td>
			</tr>
			<tr> 
				<td>Kategori</td>
				<td><input type="text" name="kategori" value=<?php echo $kategori;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="kode_barang" value=<?php echo $_GET['kode_barang'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>