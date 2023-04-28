<?php require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<script>
  function confirmLogout() {
    if (confirm("Are You Sure You Want To Logout?")) {
      return true;
    } else {
      return false;
    }
  }
</script>
<body>
<?php
if(!isset($_SESSION['user'])){
?> 
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
<a href="#" class="navbar-brand" style="color: green;">
      <img src="#" width="45" alt="" class="d-inline-block align-middle mr-2">
      <span class="text-uppercase font-weight-bold">movie station</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto" style="margin: 0;">
        <li class="nav-item">
          <a class="nav-link active" id="links" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="browse.php">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="watchlist.php">watchlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="login.php">feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="login.php">requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="login.php">Login</a>
        </li>
        
      </ul>
    </div>
</nav>
<?php
}
else{

?>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
<a href="#" class="navbar-brand" style="color: green;">
      <img src="#" width="45" alt="" class="d-inline-block align-middle mr-2">
      <span class="text-uppercase font-weight-bold">movie station</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto" style="margin:0;">
        <li class="nav-item">
          <a class="nav-link active" id="links" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="browse.php">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="watchlist.php">watchlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="feedback.php">feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="request.php">requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="logout.php" onclick="return confirmLogout()">logout</a>
        </li>
        <li class="nav-item" style="margin-top:10px;">
          <a class="nav-link" id="links" style="padding:0;margin-left: 490px" href="#"><p style="margin: 0;"> <img src="images/user.png" alt="" style="width:20px; hight:20px;"> <span><?php echo $_SESSION['user'] ?></span></p></a>
        </li>
      </ul>
    </div>
</nav>
<?php } ?>
</body>
</html>