<?php 
session_start();

include_once '../db_connect.php';

if (isset($_GET['email'])) {
  $query = "SELECT name, email FROM funder WHERE email = '" . $_GET['email'] . "';";
  $result = pg_query($query);
  $row = pg_fetch_row($result);

} 

if (isset($_POST['btn-confirm'])) {
  $name = pg_escape_string($_POST['name']);
  $email = pg_escape_string($_GET['email']);

  //check for duplicate name   
  $duplicate_names = pg_query("SELECT * FROM funder WHERE name='$name' AND email != '$email' ");
  if (pg_num_rows($duplicate_names)>=1) {
    ?>
    <script>alert('The user name is taken. Please try another name.');</script>
    <?php 
  }else {
    $query = "UPDATE funder SET name='$name' WHERE email = '$email'";
    pg_query($query);
    header("Location: funder.php");
  }
}
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
    <h4>Funder: <?php echo $_GET["email"];?> </h4>
    <div class="wrap">
      <form method="post">
        <div class="form-group">
          <label for="input-email">Email (cannot be changed)</label>
          <input id="input-email" name="email" class="form-control" value = "<?php echo $_GET["email"];?>" placeholder= <?php echo $_GET["email"];?> >
          <label for="input-name">Name</label>

          <input id="input-name" name="name" type="text" class="form-control" value=<?php echo '"' . $row[0] . '"';?> >

        </div>
        <button name="btn-confirm" type="submit" class="btn btn-primary">Confirm</button>
      </form>
    </div>
  </div>

</body>

</html>
