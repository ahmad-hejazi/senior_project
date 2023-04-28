<?php
require 'config.php';
    if(isset($_GET['id']) && isset($_SESSION['user'])){
        $conn = mysqli_connect($server, $user, $pass, $database) or
        die("can't open connection");
        $user = $_SESSION['user'];
        $query1 = "SELECT * FROM user where username = '$user'";
        $res1 = mysqli_query($conn,$query1);
        while($row = mysqli_fetch_assoc($res1)){
            $uid = $row['id'];
        }
        $id = $_GET['id'];
        //query to delete from the database
        $sql = "INSERT INTO watchlist set mid= $id, uid=$uid";
        
        $result = mysqli_query($conn,$sql);
        if($result == true){
            $_SESSION['add'] = "<div class = 'success'>Movie Added Successfully</div>";
              header('location: details.php?id='.$id);
            }
        else{
            $_SESSION['add'] = "<div class = 'error'>Failed to delete category</div>";
            header('location: details.php?id='.$id);
        }
    }
    else{
        header('location: details.php?id='.$id);
    }
?>