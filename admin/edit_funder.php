<?php 
include_once '../db_connect.php';
?>

<!DOCTYPE html>
<html>

<head>
   <title>Edit Funders</title>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/head.php';?>
</head>

<body>
  <?php require 'sidebar.php';?>

  <div class="admin-manage">
    <h3>Edit Funder Information</h3>
    <div class="wrap">
      <form method="post" action="" onsubmit="return validate()">
        <div class="form-group">
          <label for="input-name">Name</label>
          <input id="input-name" name="name" type="text" class="form-control" placeholder=".$_GET['name'].">
        </div>
        <div class="form-group">
          <label for="input-email">Email</label>
          <input id="input-email" name="email" type="text" class="form-control" placeholder= $_GET['email']>
        </div>
        <button name="btn-signup" type="submit" class="btn btn-default">Confirm</button>
      </form>
    </div>
  </div>

</body>

</html>
