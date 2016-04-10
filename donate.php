<?php 

session_start();

include_once 'db_connect.php';

if (isset($_GET['title'])) {

  $result = pg_query("SELECT title, category, current_amount, target_amount FROM project WHERE title = '" . $_GET['title'] . "'");
  $row = pg_fetch_row($result);

  if (isset($_POST['btn-donate'])) {
    $amount = pg_escape_string($_POST['amount']);
    $query_project = "UPDATE project SET current_amount = $amount + current_amount WHERE title = '" . $_GET['title'] . "'";
    if ($_SESSION['domain'] === 'funder') {
      pg_query("INSERT INTO fund (funder_email, project_title, amount) 
                VALUES ('" . $_SESSION['email'] . "', '" . $_GET['title'] . "', '" . $amount . "');");
    }
    if (pg_query($query_project)) {
      header("Location: project_list.php?message=" . urlencode("Thanks for your donation!"));
    } else {
      ?>
      <script>alert("error")</script>
      <?php
    }


  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Donate</title>
  <?php require 'head.php';?>
</head>


<body>
  <?php require 'navbar.php';?>
  <?php 
  echo "<p>You are donating to: " . $row[0] . "</p>";
  echo "<p>Goal: \$" . $row[3] . "</p>";
  echo "<p>Currently received: \$" . $row[2] . "</p>";
  ?>
  <form method="post">
    <div class="form-group">
      <label for="amount">Amount to donate: </label>
      <input id="amount" name="amount" type="number" class="form-control" required>
    </div>
    <button name="btn-donate" type="submit" class="btn btn-default">Donate</button>
  </form>
  <?php include 'footer.php';?>

</body>

</html>
