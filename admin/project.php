<?php 
include_once '../db_connect.php';
$query = "SELECT title, owner, category,start_date, end_date,target_amount,current_amount, status, description FROM project";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
?>

<!DOCTYPE html>
<html>

<head>
  <title>Manage Projects</title>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/head.php';?>
</head>

<body>
  <?php require 'sidebar.php';?>

  <div class="admin-manage">
    <h3>Project list</h3>
    <div class="table">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Tartget Amount</th>
            <th>Current Amount</th>
            <th>Status</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = pg_fetch_row($result)){
            echo "</tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td>" . $row[3] . "</td>";
            echo "<td>" . $row[4] . "</td>";
            echo "<td>" . $row[5] . "</td>";
            echo "<td>" . $row[6] . "</td>";
            echo "<td>" . $row[7] . "</td>";
            echo "<td>" . $row[8] . "</td>";
            echo '<td>';
            echo '<a href="edit_project.php?title=' .$row[0]. '"><button type="button" class="btn btn-primary">Edit</button></a>';
            echo '<a href="delete_project.php?title=' . $row[0] . '"><button type="button" class="btn btn-danger">Delete</button></a>';
            echo '</td>';
            echo "</tr>";
          }?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
