<?php 
include_once '../db_connect.php';
$query = "DELETE FROM project WHERE title = '" . $_GET['title']. "'";
pg_query($query);
header("Location: project.php");
?>
