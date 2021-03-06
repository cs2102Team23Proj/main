<?php
session_start();

include_once 'db_connect.php';

if (isset($_POST['btn-signup'])) {
  $name = pg_escape_string($_POST['name']);
  $email = pg_escape_string($_POST['email']);

  //check for duplicate name and email
  $duplicate_emails = pg_query("SELECT * FROM entrepreneur WHERE email='$email'");
  if (pg_num_rows($duplicate_emails)>=1) {
    ?>
    <script>alert('The email address is already registered.');</script>
    <?php
  } else {
    $duplicate_names = pg_query("SELECT * FROM entrepreneur WHERE name='$name'");
    if (pg_num_rows($duplicate_names)>=1) {
      ?>
      <script>alert('The user name is taken. Please try another name.');</script>
      <?php
    } else {
      $password = pg_escape_string($_POST['password']);
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO entrepreneur (email, name, password) VALUES ('" . $email . "', '" . $name . "', '" . $hash . "');";
      if(pg_query($query)){
        header("Location: sign_up_entrepreneur_success.php");
      } else {
        ?>
        <script>alert('Error while registering you. Please try again.');</script>
        <?php
      }
    }
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Entrepreneur Sign Up</title>
  <?php require 'head.php';?>

  <script type="text/javascript">
    function validate(){
      if ($("#input-password").val() != $("#input-confirm-password").val()) {
        $("#group-confirm-password").addClass("has-error");
        return false;
      } else {
        return true;
      }
    }
  </script>
</head>

<body>

  <?php require 'navbar.php';?>

  <div>
    <h2>Create Entrepreneur Account</h2>
    <h4><a href="sign_up.php">User sign up?</a></h4>
    <div class="wrap">
      <form method="post" onsubmit="return validate()">
        <div class="form-group">
          <label for="input-email">Email Address *</label>
          <input id="input-email" name="email" type="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="input-name">Name *</label>
          <input id="input-name" name="name" type="text" class="form-control" placeholder="User Name" required>
        </div>
        <div class="form-group">
          <label for="input-password">Password *</label>
          <input id="input-password" name="password" type="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group" id="group-confirm-password">
          <label for="input-confirm-password" class="control-label">Confirm Password *</label>
          <input id="input-confirm-password" type="password" class="form-control" placeholder="Password" required>
        </div>
        <button name="btn-signup" type="submit" class="btn btn-default">Create Account</button>
      </form>
    </div>
  </div>

  <?php include 'footer.php';?>
</body>

</html>
