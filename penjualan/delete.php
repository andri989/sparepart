<?php
// include database connection file
include_once("../config.php");
 
// Get id from URL to delete that user
$no_faktur = $_GET['no_faktur'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM penjualan WHERE no_faktur=$no_faktur");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
?>