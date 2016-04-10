<?php 
include_once 'db_connect.php';
?>


<!DOCTYPE html>
<html>

<head>
  <title>Fund Together</title>
  <?php require 'head.php';?>
</head>


<body>
  <?php require 'navbar.php';?>
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/art.jpg" alt="...">
        <div class="carousel-caption">
          <h4>View Arts Projects</h4>
        </div>
      </div>
      <div class="item">
        <img src="images/education.jpg" alt="...">
        <div class="carousel-caption">
          <h4>View Education Projects</h4>
        </div> 
      </div>
      <div class="item">
        <img src="images/environment.jpg" alt="...">
        <div class="carousel-caption">
          <h4>View Environment Projects</h4>
        </div>
      </div>
      <div class="item">
        <img src="images/techonology.jpg" alt="...">
        <div class="carousel-caption">
          <h4>View Techonology Projects</h4>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php include 'footer.php';?>

</body>

</html>
