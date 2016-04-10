<?php 
session_start();
include_once 'db_connect.php';

if (isset($_SESSION['domain'])) {
    $query = "SELECT f.project_title, p.description, f.amount
            FROM fund f, funder fr, project p
            WHERE fr.name = '" . $_SESSION['name'] . "'
            AND p.title = f.project_title
            AND f.funder_email = fr.email;"  ;
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    
}

?>

<!DOCTYPE html>
<html>

  <head>
    <title>My Profile</title>
    <?php require 'head.php';?>
  </head>


  <body>
  <?php require 'navbar.php';?>
  <div class="wrap">
    <h3>My Fund</h3>
    <table class="table table-hover table-bordered">
      <thead>
          <tr>
              <th>Project Name</th>
              <th>Description</th>
              <th>Fund Amount</th>
          </tr>
      </thead>
     <tbody>
          <?php
          while ($row = pg_fetch_row($result)){
            echo "</tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";

            echo "</tr>";
          }?>
     </tbody>
    </table>
</div>

 
  <?php include 'footer.php';?>

</body>

</html>
