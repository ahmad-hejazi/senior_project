<?php
require 'config.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //query to delete from the database
        $sql = "DELETE FROM categories WHERE cid = $id";
        $conn = mysqli_connect($server, $user, $pass, $database) or
        die("can't open connection");
        $result = mysqli_query($conn,$sql);
        if($result == true){
            $_SESSION['delete'] = "<div class='alert alert-success' role='alert'>Category Deleted Successfully</div>";
              header('location: manage_categories.php');
            }
        else{
            $_SESSION['delete'] = "<div class='alert alert-danger' role='alert'>Failed to delete category</div>";
            header('location: manage_categories.php');
        }
    }
    else{
        
        header('location: manage_categories.php');
    }
?>