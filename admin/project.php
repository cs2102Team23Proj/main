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
            <th>Start_date</th>
            <th>End_date</th>
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
            echo '<a href="edit_funder.php?title=' .$row[0]. '&owner=' . $row[1] . '&category=' . $row[2] . '&start_date=' . $row[3] . '&end_date=' . $row[4] . '&tartget_amount=' . $row[5] . '&current_amount=' . $row[6] . '&status=' . $row[7] . '&description=' . $row[8] . '"><button type="button" class="btn btn-primary">Edit</button></a>';
            echo '<a href="delete_entrepreneur.php?title=' . $row[0] . '"><button type="button" class="btn btn-danger">Delete</button></a>';
            echo '</td>';
            echo "</tr>";
          }?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
