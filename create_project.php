<?php 
session_start();

include_once 'db_connect.php';

if (isset($_SESSION['domain'])&&($_SESSION['domain'])==="entrepreneur") {
  if (isset($_POST['btn-confirm'])) {
    $title = pg_escape_string($_POST['title']);
    $owner = $_SESSION['email'];
    $category = pg_escape_string($_POST['category']);
    $start_date = pg_escape_string($_POST['start_date']);
    $end_date = pg_escape_string($_POST['end_date']);
    $target_amount= pg_escape_string($_POST['target_amount']);
    $description = pg_escape_string($_POST['description']);

    $query = "INSERT INTO project (title, description, owner, start_date, end_date, category, target_amount) 
              VALUES ('" . $title . "', '" . $description . "', '" . $owner .  "', '" . $start_date .  "', '" . 
              $end_date .  "', '" . $category .  "', '" . $target_amount . "');";
    if (pg_query($query)) {
      header("Location: entrepreneur_profile.php"); 
    } else {
      echo "<script>alert('error');</script>";
    }
  }
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
  <h2>Create Project</h2>
  <div class="wrap">
    <form method="post">
      <label for="input-title">Project Title (cannot be changed)</label>
      <input id="input-title" name="title" class="form-control" placeholder= <?php echo $_GET["title"];?> >
      <label for="input-category">Category</label>
      <input id="input-category" name="category" type="text" class="form-control">
      <label for="input-start_date">Start Date</label>
      <input id="input-start_date" name="start_date" type="date" class="form-control">
      <label for="input-end_date">End Date</label>
      <input id="input-end_date" name="end_date" type="date" class="form-control">
      <label for="input-target_amount">Target Amount</label>
      <input id="input-target_amount" name="target_amount" type="number" class="form-control">
      <label for="input-description">Description</label>
      <input id="input-description" name="description" type="text" class="form-control">

      <button name="btn-confirm" type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
  <?php include 'footer.php';?>

</body>

</html>
