<?php 
include_once '../db_connect.php';
$query = "DELETE FROM user WHERE name = '" . $_GET['name']. "'";
pg_query($query);
header("Location: user.php");
?>
