<?php 
session_start();

include_once 'db_connect.php';

if (isset($_GET['title'])) {
  $query = "SELECT p.title, e.name, p.category, p.start_date, p.end_date, p.target_amount, p.current_amount, p.status, p.description
            FROM project p, entrepreneur e
            WHERE p.owner=e.email AND title = '" . $_GET['title'] . "';";
  $result = pg_query($query) or die('Query failed: ' . pg_last_error());
  $row = pg_fetch_row($result);
}
?>


<!DOCTYPE html>
<html>

  <head>
    <title> </title>
    <?php require 'head.php';?>
  </head>


  <body>
  <?php require 'navbar.php';?>
  <div class="jumbotron">
    <h2><?php echo $row[0];?></h2>
    <p><?php echo $row[8]; ?></p>
  </div>
  <p>Proposed by: <?php echo $row[1]; ?></p>
  <p>Category: <?php echo $row[2]; ?></p>
  <p>Start Date: <?php echo $row[3]; ?></p>
  <p>End Date: <?php echo $row[4]; ?></p>
  <p>Target Amount: <?php echo $row[5]; ?></p>
  <p>Raised Amount: <?php echo $row[6]; ?></p>
  <p><?php echo '<a href="donate.php?title=' . urlencode($row[0]) . '"><button type="button" class="btn btn-default">Donate</button></a>'; ?>
  </p>
  <?php include 'footer.php';?>

</body>

</html>
