<?php 
session_start();

?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Fund Together</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">HOME</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROJECT<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="project_list.php">All Projects</a></li>
            <li class="divider"></li>
            <li><a href="project_list.php?category=arts">Arts</a></li>
            <li><a href="project_list.php?category=education">Education</a></li>
            <li><a href="project_list.php?category=environment">Environment</a></li>
            <li><a href="project_list.php?category=technology">Technology</a></li>
          </ul>
        </li>
      </ul>
      <form action = "project_list.php" method = "get" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" name = "search" class="form-control" placeholder="Find Project">
        </div>
        <button type="submit" class="btn btn-default">Find</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      <?php 
      if (isset($_SESSION['domain'])&&($_SESSION['domain'])=="funder") {
        echo "<li><a href='user_profile.php'>" . $_SESSION['name'] . ", user</a></li>";
        echo "<li><a href='logout.php'>Log Out</a></li>";
      } else if (isset($_SESSION['domain'])&&($_SESSION['domain'])=="entrepreneur") {
        echo "<li><a href='create_project.php'>Create Project</a></li>";
        echo "<li><a href='entrepreneur_profile.php'>" . $_SESSION['name'] . ", " . $_SESSION['domain'] . "</a></li>";
        echo "<li><a href='logout.php'>Log Out</a></li>";
      } else {
        echo "<li><a href='login.php'>Log In</a></li>";
        echo "<li><a href='sign_up.php'>Sign Up</a></li>";
      }
      ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>