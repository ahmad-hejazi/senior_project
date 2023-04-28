<?php include('partials/menu.php'); ?>
<div class = "main-content">
    <div class = "wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "Select * from categories Where cid = $id";
            $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            
            if($count == 1){
                //true
                $row = mysqli_fetch_assoc($result);
                $title = $row['name'];
                $current_image = $row['Image_name'];
                
            }
            else{
                //false
                $_SESSION['noCategory'] = "<div class ='error'>Category not found</div>";
                header('location:manage_categories.php');
            }
        }
        else{
            header('location: manage_categories.php');
        }
        
        ?>
        <form method = "POST" enctype = "multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type = "text" name = "title" value="<?php echo $title; ?>" placeholder = "Title" autofocus class = "input">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image == ""){
                                //not available
                                echo "<div class = 'error'>Image Not Available</div>";
                            }
                            else{
                                //available
                                ?>
                                <img src ="<?php echo "images/categories/".$current_image ?>" width="150">
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type = "file" name = "image"  autofocus class = "input">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type = "hidden" name="current_image" value = "<?php echo $current_image; ?>">
                        <input type = "hidden" name = "id" value= "<?php echo $id; ?>">
                        <input type ="submit" name = "submit" value = "Update Category" class = "btn-secondary">
                    </td>
                </tr>
                
            </table>
        </form>
        
        <?php
        if(isset($_POST['submit'])){
            //clicked
            //get the values from the form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            //check and update image
            if(isset($_FILES['image']['name'])){
                //get the image info
                $image_title = $_FILES['image']['name'];
                if($image_title !=""){
                    //image is availablae
                    //upload the new image
                        $ext = explode(".",$image_title);
                        $extension = end($ext);
                        $image_title = $title.'.'.$extension;
                        $source = $_FILES['image']['tmp_name'];
                        $destination = "images/categories/".$image_title;
    
                        $upload = move_uploaded_file($source,$destination);
    
                        if($upload == false){
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                            echo "<script>window.location.href = 'manage_categories.php'</script>";                            die();
                        }
                        //remove the old image
                        if($current_image != ""){
                            $removePath = "images/categories/".$current_image; 
                            unlink($removePath);
                        }
                }
                else{
                    $image_title = $current_image;
                }
            }
            else{
                $image_title = $current_image;
            }
            
            //update the database
            $sql2 = "UPDATE categories SET name = '$title', Image_name='$image_title' WHERE cid = $id";
            $res = mysqli_query($conn,$sql2);
            
            //check and redirect
            if($res == true){
                $_SESSION['update'] = "<div class='alert alert-success' role='alert'>Category Updated Successfully</div>";
                header('location: manage_categories.php');
            }
            else{
                $_SESSION['update'] = "<div class='alert alert-danger' role='alert'>Failed To Update Category</div>";
                header('location: manage_categories.php');
            }
        }
        
        ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>