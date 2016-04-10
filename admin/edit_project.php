<?php 
session_start();

include_once '../db_connect.php';

if (isset($_GET['title'])) {
  $query = "SELECT title,owner,category,start_date,end_date,target_amount,current_amount, status, description FROM project WHERE title = '" . $_GET['title'] . "';";
  $result = pg_query($query);
  $row = pg_fetch_row($result);

} 

if (isset($_POST['btn-confirm'])) {
  $title = pg_escape_string($_GET['title']);
  $owner = pg_escape_string($_POST['owner']);
  $category = pg_escape_string($_POST['category']);
  $start_date = pg_escape_string($_POST['start_date']);
  $end_date = pg_escape_string($_POST['end_date']);
  $target_amount= pg_escape_string($_POST['target_amount']);
  $current_amount = pg_escape_string($_POST['current_amount']);
  $status = pg_escape_string($_POST['status']);
  $description = pg_escape_string($_POST['description']);

    $query = "UPDATE project SET owner='$owner', category='$category', start_date='$start_date', end_date='$end_date', target_amount ='$target_amount' , current_amount='$current_amount', status='$status', description ='$description' WHERE title = '$title'";
   if(pg_query($query)) {
      header("Location: project.php"); 
   
    } else {
        ?>
        <script>alert('Error');</script>
        <?php
      }
  }

?>

<!DOCTYPE html>
<html>

<head>
   <title>Edit Projects</title>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/head.php';?>
</head>

<body>
  <?php require 'sidebar.php';?>
  <div class="admin-manage">
    <h3>Edit Project Information</h3>
    <h4>Project: <?php echo $_GET["title"];?> </h4>
    <div class="wrap">
      <form method="post">
        <div class="form-group">
          <label for="input-title">Project Title (cannot be changed)</label>
          <input id="input-title" name="title" class="form-control" value = "<?php echo $_GET["title"];?>" placeholder= <?php echo $_GET["title"];?> >

          <label for="input-owner">Owner</label>
          <input id="input-owner" name="owner" type="text" class="form-control" value=<?php echo '"' . $row[1] . '"';?> >
          <label for="input-category">Category</label>
          <input id="input-category" name="category" type="text" class="form-control" value=<?php echo '"' . $row[2] . '"';?> >
          <label for="input-start_date">Start Date</label>
          <input id="input-start_date" name="start_date" type="text" class="form-control" value=<?php echo '"' . $row[3] . '"';?> >
          <label for="input-end_date">End Date</label>
          <input id="input-end_date" name="end_date" type="text" class="form-control" value=<?php echo '"' . $row[4] . '"';?> >
          <label for="input-target_amount">Target Amount</label>
          <input id="input-target_amount" name="target_amount" type="text" class="form-control" value=<?php echo '"' . $row[5] . '"';?> >
          <label for="input-current_amount">Current Amount</label>
          <input id="input-current_amount" name="current_amount" type="text" class="form-control" value=<?php echo '"' . $row[6] . '"';?> >
          <label for="input-status">Status</label>
          <input id="input-status" name="status" type="text" class="form-control" value=<?php echo '"' . $row[7] . '"';?> >
          <label for="input-description">Description</label>
          <input id="input-description" name="description" type="text" class="form-control" value=<?php echo '"' . $row[8] . '"';?> >

        </div>
        <button name="btn-confirm" type="submit" class="btn btn-primary">Confirm</button>
      </form>
    </div>
  </div>

</body>

</html>
