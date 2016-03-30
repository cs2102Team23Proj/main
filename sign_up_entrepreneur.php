<?php 
include_once 'db_connect.php';

if(isset($_POST['btn-signup'])){
  $name = pg_escape_string($_POST['name']);
  $password = pg_escape_string($_POST['password']);
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $query = "INSERT INTO entrepreneur (name, password) VALUES ('" . $name . "', '" . $hash . "');";
  pg_query($query);
  header("Location: index.php");
}
?>


<!DOCTYPE html>
<html>

<?php require 'head.php';?>

<body>

  <?php require 'navbar.php';
    
  ?>

  <div>
    <h2>Create Entrepreneur Account</h2>
    <h4><a href="sign_up.php">User sign up?</a></h4>
    <div class="wrap">
      <form method="post" action="">
        <div class="form-group">
          <label for="input-name">Name *</label>
          <input id="input-name" name="name" type="text" class="form-control" placeholder="User Name" required>
        </div>
        <div class="form-group">
          <label for="input-password">Password *</label>
          <input id="input-password" name="password" type="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="input-confirm-password">Confirm Password *</label>
          <input id="input-confirm-password" type="password" class="form-control" placeholder="Password" required>
        </div>
        <button name="btn-signup" type="submit" class="btn btn-default">Create Account</button>
      </form>
    </div>
  </div>

  <?php include 'footer.php';?>
</body>

</html>

