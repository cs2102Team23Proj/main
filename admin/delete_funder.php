<?php 
include_once '../db_connect.php';
$query = "DELETE FROM funder WHERE email = '" . $_GET['email']. "'";
pg_query($query);
header("Location: funder.php");
?>
