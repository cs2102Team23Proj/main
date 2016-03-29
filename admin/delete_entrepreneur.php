<?php 
include_once '../db_connect.php';
$query = "DELETE FROM entrepreneur WHERE name = '" . $_GET['name']. "'";
pg_query($query);
header("Location: entrepreneur.php");
?>
