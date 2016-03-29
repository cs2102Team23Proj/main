<?php 
include_once '../db_connect.php';
$query = "SELECT name FROM entrepreneur";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
?>

<!DOCTYPE html>
<html>

<head>
  <?php require 'head.php';?>
</head>

<body>
  <?php require 'sidebar.php';?>

  <div class="admin-manage">
    <h3>Entrepreneur list</h3>
    <div class="table">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Entrepreneur Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = pg_fetch_row($result)){
            echo "</tr>";
            echo "<td>" . $row[0] . "</td>";
          ?>
            <td>
              <a href=#><button type="button" class="btn btn-primary">Edit</button></a>
              <a href=#><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
          <?php echo "</tr>";   
          }?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
