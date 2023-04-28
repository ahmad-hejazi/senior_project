<?php
    require 'partials/menu.php';
    require 'config.php';
    $id = $_GET['id'];
    
    $sql = "DELETE from admin WHERE id = $id";
    $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
    $result = mysqli_query($conn,$sql);
    if($result == true){
        $_SESSION['delete'] = "<div class='alert alert-success' role='alert'>Admin Deleted Successfully.</div>";
        header('location: manage_admin.php');
    }
    else{
        $_SESSION['delete'] = "<div class='alert alert-danger' role='alert'>Failed to delete Admin!</div>";
        header('location: manage_admin.php');
    }
?>