<?php 
include_once '../db_connect.php';
$query = "DELETE FROM funder WHERE name = '" . $_GET['name']. "'";
pg_query($query);
header("Location: funder.php");
?>
