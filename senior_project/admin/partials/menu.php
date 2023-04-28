<?php
require 'config.php';
if(!isset($_SESSION['admin'])){
          $_SESSION['no-login']="<div class='alert alert-danger' role='alert'>Please Login To Access Admin Panel.</div>";
          header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <title>Admin Panel</title>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css"/>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top">
<a href="#" class="navbar-brand">
      <img src="#" width="45" alt="" class="d-inline-block align-middle mr-2">
      <span class="text-uppercase font-weight-bold">movie station</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" id="links" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="manage_admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="manage_categories.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="manage_movies.php">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="manage_feedbacks.php">Feedbacks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="manage_requests.php">Requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="links" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
</nav>
</body>
</html>