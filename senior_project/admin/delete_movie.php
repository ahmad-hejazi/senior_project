<?php
    include('config.php'); 
    //check ig the id and image title are passed
    if(isset($_GET['id']) && isset($_GET['image_title'])){
        //delete
        //get the id and the image name
        $id = $_GET['id'];
        $image_title = $_GET['image_title'];
        //remove the image
       /*if($image_title != ""){
            $path = "images/movies/".$image_title;
            $remove = unlink($path);
            if($remove == false){
                //failed to delete movie
                $_SESSION['upload'] = "<div class = 'error'>Failed To Delete Movie</div>";
                header('location: manage_movie.php');
                //stop the process
                die();
            }
        }*/
        //delete food from database
        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
        $sql0 = "DELETE from reviews where mid = $id";
        mysqli_query($conn,$sql0);
        $sql01 = "DELETE from watchlist where mid = $id";
        mysqli_query($conn,$sql01);
        $sql = "DELETE  from movies WHERE id=$id";
        
       $result = mysqli_query($conn,$sql);
         /*$sql2= "SET  @num := -1";
        mysqli_query($conn,$sql2);
        $sql3="UPDATE movies SET ID = @num := (@num+1)";
        mysqli_query($conn,$sql3);
        $sql4="ALTER TABLE `movies` AUTO_INCREMENT = 1";
        mysqli_query($conn,$sql4);*/
        if($result==true){
            //movie deleted
            $_SESSION['delete'] =  "<div class = 'success'>movie Deleted Successfully</div>";
            header('location: manage_movies.php');
        }
        else{
            //failed
            $_SESSION['delete'] =  "<div class = 'error'>Failed to Delete movie</div>";
            header('location: manage_movies.php');
        }
        //redirect with session
    }
    else{
        //error and redirect
        $_SESSION['unable'] = "<div class = 'error'>Unable to Find movie</div>"; 
        header('location: manage_movies.php');
    }
?>