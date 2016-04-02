<?php 
include_once '../db_connect.php';
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
    <div class="wrap">
      <form method="post" action="" onsubmit="return validate()">
        <div class="form-group">
          <label for="input-name">Title</label>
          <input id="input-name" name="title" type="text" class="form-control" placeholder= <?php echo $_GET["title"];?> >
        </div>
        <div class="form-group">
          <label for="input-email">Owner</label>
          <input id="input-email" name="owner" type="text" class="form-control" placeholder=<?php echo $_GET["owner"];?>>
        </div>
        <div class="form-group">
          <label for="input-name">Category</label>
          <input id="input-name" name="category" type="text" class="form-control" placeholder= <?php echo $_GET["category"];?> >
        </div>
        <div class="form-group">
          <label for="input-name">Start Date</label>
          <input id="input-name" name="start_date" type="text" class="form-control" placeholder= <?php echo $_GET["start_date"];?> >
        </div>
        <div class="form-group">
          <label for="input-name">End Date</label>
          <input id="input-name" name="end_date" type="text" class="form-control" placeholder= <?php echo $_GET["end_date"];?> >
        </div>
        <div class="form-group">
          <label for="input-name">Target Amount</label>
          <input id="input-name" name="tartget_amount" type="text" class="form-control" placeholder= <?php echo $_GET["tartget_amount"];?> >
        </div>
        <div class="form-group">
          <label for="input-name">Current Amount</label>
          <input id="input-name" name="current_amount" type="text" class="form-control" placeholder= <?php echo $_GET["current_amount"];?> >
        </div>
        <div class="form-group">
          <label for="input-name">Status</label>
          <input id="input-name" name="status" type="text" class="form-control" placeholder= <?php echo $_GET["status"];?> >
        </div>
        <div class="form-group">
          <label for="input-name">Description</label>
          <input id="input-name" name="descpription" type="text" class="form-control" placeholder= <?php echo $_GET["description"];?> >
        </div>
        <button name="btn-signup" type="submit" class="btn btn-default">Confirm</button>
      </form>
    </div>
  </div>

</body>

</html>
