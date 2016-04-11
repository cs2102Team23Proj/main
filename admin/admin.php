<?php 
include_once '../db_connect.php';
$query = "SELECT name FROM admin";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
?>

<!DOCTYPE html>
<html>

<head>
   <title>List admins</title>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/head.php';?>
</head>

<body>
  <?php require 'sidebar.php';?>

  <div class="admin-manage">
    <h3>Admin list</h3>
    <div class="table">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Admin Name</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = pg_fetch_row($result)){
            echo "</tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "</tr>";
          }?>
        </tbody>
      </table> 
    </div>
  </div>

</body>

</html>
