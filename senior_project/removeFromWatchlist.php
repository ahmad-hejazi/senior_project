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
        $sql = "DELETE from watchlist WHERE mid= $id AND uid=$uid";
        
        $result = mysqli_query($conn,$sql);
        if($result == true){
            $_SESSION['remove'] = "<div class = 'success'>Movie Removed Successfully</div>";
              header('location: details.php?id='.$id);
            }
        else{
            $_SESSION['remove'] = "<div class = 'error'>Failed to remove</div>";
            header('location: details.php?id='.$id);
        }
    }
    else{
        header('location: details.php?id='.$id);
    }
?>