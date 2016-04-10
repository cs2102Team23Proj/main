<?php 
session_start();

include_once 'db_connect.php';

if (isset($_POST['btn-login'])) {
  $email = pg_escape_string($_POST['email']);
  $password = pg_escape_string($_POST['password']);
  $domain = pg_escape_string($_POST['domain']);

  if ($domain==="funder") {
    $result = pg_query("SELECT email, name, password FROM funder WHERE email='$email'");
    if (pg_num_rows($result)==1) {
      $row = pg_fetch_row($result);
      if (password_verify($password, $row[2])) { // pass
        $_SESSION['domain'] = $domain;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row[1];
        header("Location: index.php");
      } else {
        auth_fail();
      }
    } else {
      auth_fail();
    }
  } elseif ($domain==="entrepreneur") {
    $result = pg_query("SELECT email, name, password FROM entrepreneur WHERE email='$email'");
    if (pg_num_rows($result)==1) {
      $row = pg_fetch_row($result);
      if (password_verify($password, $row[2])) { // pass
        $_SESSION['domain'] = $domain;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row[1];
        header("Location: index.php");
      } else {
        auth_fail();
      }
    } else {
      auth_fail();
    }
  } else {
    echo "<script>alert('Domain error');</script>";
  }
}

function auth_fail() {
  echo "<script>alert('Wrong user name or password.');</script>";
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <?php require 'head.php';?>
</head>


<body>
  <?php require 'navbar.php';?>

  <div class="wrap">
    <h2>Log In</h2>
    <h4>New Here? <a href="sign_up.php">Create an account</a></h4>
    <form method="post">
      <div class="form-group">
        <label for="input-email">Email</label>
        <input type="email" class="form-control" id="input-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="input-password">Password</label>
        <input type="password" class="form-control" id="input-password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label for="">Login As:</label>
        <div class="radio">
          <label><input type="radio" name="domain" value="funder" checked>User</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="domain" value="entrepreneur">Entrepreneur</label>
        </div>
      <button name="btn-login" type="submit" class="btn btn-default">Log In</button>
    </form>
  </div>

  <?php include 'footer.php';?>

</body>

</html>
