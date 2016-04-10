<?php 
session_start();

include_once '../db_connect.php';

if (isset($_POST['btn-login'])) {
  $name = pg_escape_string($_POST['name']);
  $password = pg_escape_string($_POST['password']);


  $result = pg_query("SELECT name, password FROM admin WHERE name='$name'");

    if (pg_num_rows($result) >=1) {
      $row = pg_fetch_row($result);
      if ($password === $row[1]) { // pass
          $_SESSION['name'] = $row[0];
          header("Location: admin_mainpage.php");
      } else {
         auth_fail();
      }
    }
}

function auth_fail() {
  echo "<script>alert('Wrong admin name or password.');</script>";
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Admin Login</title>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/head.php';?>
</head>


<body>

<h1>Admininistrator Login</h1>
  <div class="wrap">
    <form method="post">
      <div class="form-group">
        <label for="input-name">Name</label>
        <input type="name" class="form-control" id="input-name" name="name" placeholder="Name" required>
      </div>
      <div class="form-group">
        <label for="input-password">Password</label>
        <input type="password" class="form-control" id="input-password" name="password" placeholder="Password" required>
      </div>
      <button name="btn-login" type="submit" class="btn btn-default">Log In</button>
    </form>
  </div>


</body>

</html>
