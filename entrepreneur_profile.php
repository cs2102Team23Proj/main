<?php 
session_start();
include_once 'db_connect.php';

if (isset($_SESSION['domain'])) {
    $query = "SELECT p.title, p.description, p.target_amount, p.current_amount
            FROM project p, entrepreneur e
            WHERE e.name = '" . $_SESSION['name'] . "'
            AND e.email = p.owner;" ;
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
}
?>

<!DOCTYPE html>
<html>

  <head>
    <title>My Project</title>
    <?php require 'head.php';?>
  </head>

  <body>
  <?php require 'navbar.php';?>
  <div class="wrap">
    <h3>My Project</h3>
    <table class="table table-hover table-bordered">
      <thead>
          <tr>
              <th>Project Name</th>
              <th>Progress</th>
          </tr>
      </thead>
     <tbody>
          <?php
          while ($row = pg_fetch_row($result)){
            echo "</tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[3] . "/" . $row[2] . "</td>";

            echo "</tr>";
          }?>
     </tbody>
    </table>
  </div>
 
  <?php include 'footer.php';?>

</body>

</html>
