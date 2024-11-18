<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$tgl_faktur = $_POST['tgl_faktur'];
	$no_faktur=$_POST['no_faktur'];
	$nama_konsumen=$_POST['nama_konsumen'];
	$kode_barang=$_POST['kode_barang'];
	$jumlah=$_POST['jumlah'];
	$harga_satuan=$_POST['harga_satuan'];
		
	$result = mysqli_query($mysqli, "UPDATE penjualan SET tgl_faktur='$tgl_faktur', nama_konsumen='$nama_konsumen',kode_barang='$kode_barang', jumlah='$jumlah', harga_satuan='$harga_satuan' WHERE no_faktur=$no_faktur");
	
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$no_faktur = $_GET['no_faktur'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjualan WHERE no_faktur=$no_faktur");
 
while($user_data = mysqli_fetch_array($result))
{
	$tgl_faktur = $user_data['tgl_faktur'];
	$nama_konsumen = $user_data['nama_konsumen'];
	$kode_barang = $user_data['kode_barang'];
	$jumlah = $user_data['jumlah'];
	$harga_satuan = $user_data['harga_satuan'];
}
?>
<html>
<head>	
	<title>Edit Penjualan Data</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Tanggal Faktur</td>
				<td><input id="datepicker" class="form-control" name="tgl_faktur"  value=<?php echo $tgl_faktur;?>></td>
			</tr>
			<tr> 
				<td>Nama Konsumen</td>
				<td><input type="text" name="nama_konsumen" value=<?php echo $nama_konsumen;?>></td>
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
				<td><input type="text" name="jumlah" value=<?php echo $jumlah;?>></td>
			</tr>
			<tr> 
				<td>Harga Satuan </td>
				<td><input type="text" name="harga_satuan" value=<?php echo $harga_satuan;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="no_faktur" value=<?php echo $_GET['no_faktur'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
	$('#datepicker').datepicker({
	});
</script>
</html>