<?php include('partials/menu.php'); ?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br><br>
        <form action="" method = "POST" enctype = "multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td><b>Title: </b></td>
                    <td>
                        <input type = "text" name = "title" placeholder="Category's title" autofocus class = "input">
                    </td>
                </tr>
                
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" class="input">
                    </td>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type = "submit" name="submit" value = "Add Category" class ="btn-secondary">
                    </td>
                </tr>
            </table>
            
        </form>
        <?php
            $conn = mysqli_connect($server, $user, $pass, $database) or 
            die("can't open connection");
        if(isset($_POST['submit'])){
            //clicked
            //add the food in the database
            //getting the data
            $title = $_POST['title'];
            if(isset($_FILES['image']['name'])){
                $image_title = $_FILES['image']['name'];
                if($image_title!=""){
                    //image is seleceted
                    //get the extension of the image
                    $ext = explode(".",$image_title);
                    $extension = end($ext);
                    $image_title = $title.'.'.$extension;
                    $src = $_FILES['image']['tmp_name'];
                    $dst = "images/categories/".$image_title;
                    $upload  = move_uploaded_file($src,$dst);
                    if($upload==false){
                        //image not uploaded
                        $_SESSION['upload'] ="<div class='alert alert-danger' role='alert'>Failed to upload image</div>";
                        header('location: manage_movies.php');
                        //stop the processes
                        die();
                    }
                }
            }
            else{
                $image_title = "";//default value
            }
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
              
                $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
                $sql = "INSERT INTO categories SET name = '$title', Image_name = $image_title";
                $result = mysqli_query($conn,$sql); 
                if($result){
                    $_SESSION['add'] = "<div class='alert alert-success' role='alert'>Category added successfully</div>";
                    header('location: manage_categories.php');
                }
                else{
                    $_SESSION['add'] = "<div class='alert alert-danger' role='alert'>Failed to add category</div>";
                   header('location: add_categories.php');
                }
            }
        }
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>