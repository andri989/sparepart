<?php
// include database connection file
include_once("../config.php");
 
// Get id from URL to delete that user
$kode_barang = $_GET['kode_barang'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM barang WHERE kode_barang=$kode_barang");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:../index.php");
?>