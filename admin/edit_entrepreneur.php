<?php 
session_start();

include_once '../db_connect.php';

if (isset($_GET['email'])) {
  $query = "SELECT name, password, email FROM entrepreneur WHERE email = '" . $_GET['email'] . "';";
  $result = pg_query($query);
  $row = pg_fetch_row($result);

} 

if (isset($_POST['btn-confirm'])) {
  $name = pg_escape_string($_POST['name']);
  $password = pg_escape_string($_POST['password']);
  $email = pg_escape_string($_GET['email']);

  //check for duplicate name   
  $duplicate_names = pg_query("SELECT * FROM entrepreneur WHERE name='$name' AND email != '$email' ");
  if (pg_num_rows($duplicate_names)>=1) {
    ?>
    <script>alert('The entreprenuer name is taken. Please try another name.');</script>
    <?php 
  }else {
    $query = "UPDATE entrepreneur SET name='$name' , password='password' WHERE email = '$email'";
    pg_query($query);
    header("Location: entrepreneur.php");
  }
}
?>

<!DOCTYPE html>
<html>

<head>
   <title>Edit Entrepreneurs</title>
   <?php require $_SERVER['DOCUMENT_ROOT'] . '/head.php';?>
</head>

<body>
  <?php require 'sidebar.php';?>
  <div class="admin-manage">
    <h3>Edit Entrepreneur Information</h3>
    <h4>Entrepreneur: <?php echo $_GET["email"];?> </h4>
    <div class="wrap">
      <form method="post">
        <div class="form-group">
          <label for="input-email">Email (cannot be changed)</label>
          <input id="input-email" name="email" class="form-control" value = "<?php echo $_GET["email"];?>" placeholder= <?php echo $_GET["email"];?> >
          <label for="input-name">Name</label>

          <input id="input-name" name="name" type="text" class="form-control" value=<?php echo '"' . $row[0] . '"';?> >
          <label for="input-password">Password</label>

          <input id="input-password" name="password" type="text" class="form-control" value=<?php echo '"' . $row[1] . '"';?> >

        </div>
        <button name="btn-confirm" type="submit" class="btn btn-primary">Confirm</button>
      </form>
    </div>
  </div>

</body>

</html>
