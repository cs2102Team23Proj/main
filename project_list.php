<?php 

session_start();

include_once 'db_connect.php';

if (isset($_GET['message'])) {
  echo '<script>alert("' . $_GET['message'] . '")</script>';
}

if (isset($_GET['category'])) {
  $query = "SELECT title, category, current_amount, target_amount FROM project WHERE status = true AND category = '" . $_GET['category'] . "';";
  $result = pg_query($query);

}

else if (isset($_GET['search'])) {
  $query = "SELECT title, category, current_amount, target_amount FROM project WHERE status = true AND title like '%".$_GET['search']."%'";
  $result = pg_query($query);

} 

else {
$query = "SELECT title, category, current_amount, target_amount FROM project WHERE status = true";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
}

?>

<!DOCTYPE html>
<html>

  <head>
    <title>Listing Projects</title>
    <?php require 'head.php';?>
  </head>


  <body>
  <?php require 'navbar.php';?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Current Amount</th>
        <th>Tartget Amount</th>
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
        echo '<td>';
        echo '<a href="project.php?title=' . urlencode($row[0]) . '"><button type="button" class="btn btn-default">View Details</button></a>';
        echo '<a href="donate.php?title=' . urlencode($row[0]) . '"><button type="button" class="btn btn-default">Donate</button></a>';
        echo '</td>';
        echo "</tr>";
      }?>
    </tbody>
  </table>
  <?php include 'footer.php';?>

</body>

</html>
