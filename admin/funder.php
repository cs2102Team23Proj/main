<?php 
include_once '../db_connect.php';
$query = "SELECT name FROM funder";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
?>

<!DOCTYPE html>
<html>

<head>
   <title>Manage Funders</title>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/head.php';?>
</head>

<body>
  <?php require 'sidebar.php';?>

  <div class="admin-manage">
    <h3>Funder list</h3>
    <div class="table">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Funder Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = pg_fetch_row($result)){
            echo "</tr>";
            echo "<td>" . $row[0] . "</td>";
            echo '<td>';
            echo '<a href=#><button type="button" class="btn btn-primary">Edit</button></a>';
            echo '<a href="delete_funder.php?name=' . $row[0] . '"><button type="button" class="btn btn-danger">Delete</button></a>';
            echo '</td>';
            echo "</tr>";
          }?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
