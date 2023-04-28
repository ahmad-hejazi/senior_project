<?php include('partials/menu.php');
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
        $sql2 = "SELECT * from movies where id='$id'";
        $res = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($res);
        $title = $row2['title'];
        $year = $row2['year'];
        $description = $row2['description'];
        $cast = $row2['cast'];
        $category = $row2['category'];
        $rate = $row2['rate'];
        $current_image = $row2['image_name'];
        $current_1st_category = $row2['cid1'];
        $current_2nd_category = $row2['cid2'];
        $trailer =  $row2['trailer'];
        $tag =  $row2['tag'];
    }
    else{
        header('location: manage_movies.php');
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Movie</h1>
        <br><br>
        <form method="POST" enctype="multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title: </td>
                    <td> 
                        <input type = "text" name = "title" value="<?php echo $title; ?>"  placeholder = "Title" autofocus class = "input">
                    </td>
                </tr>
                <tr>
                    <td>Year: </td>
                    <td> 
                        <input type = "year" name = "year" value="<?php echo $year; ?>"  placeholder = "year" autofocus class = "input">
                    </td>
                </tr>
                <tr>
                    <td>Rate </td>
                    <td>
                        <input type="number" name="rate" step=".1" value = "<?php echo $rate; ?>" autofocus class="input">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" style="width: 100%; height: 300px;" class="input" cols="200" rows="30" placeholder="Description"><?php echo $description ; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>cast: </td>
                    <td>
                    <textarea name="cast" style="height: 100px; width: 100%;" id="" class="input" cols="100" rows="30" placeholder="cast"><?php echo $cast ; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>trailer: </td>
                    <td>
                        <input type="text" name="trailer" class="input" value="<?php echo $trailer?>">
                    </td>
                </tr>
                <tr>
                    <td>tag: </td>
                    <td>
                    <textarea name="tag" style="height: 100px; width: 100%;" id="" class="input" cols="100" rows="30" placeholder="tag"><?php echo $tag ; ?></textarea>
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
                                <img src ="<?php echo "images/movies/".$current_image ?>" width="150">
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
                    <td>1st Category: </td>
                    <td>
                    <select class="input" name="category" id="">'
                            <?php
                            //display the categories with sql query
                            $sql = "SElECT * FROM categories";
                            $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
                            $result =mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($result);
                            if($count>0){
                                //category found
                                while($row=mysqli_fetch_assoc($result)){
                                    //get the category details
                                    $id1 = $row['cid'];
                                    $title = $row['name'];
                                    ?>
                                    <option <?php if($id1 == $current_1st_category) echo "selected = 'selected'" ?> value="<?php echo $id1; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            }
                            else{
                                //category not found
                                ?>
                                <?php
                            }
                            ?>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>2nd Category: </td>
                    <td>
                    <select class="input" name="category2" id="">'
                            <?php
                            //display the categories with sql query
                            $sql = "SElECT * FROM categories";
                            $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
                            $result =mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($result);
                            if($count>0){
                                //category found
                                while($row=mysqli_fetch_assoc($result)){
                                    //get the category details
                                    $id2 = $row['cid'];
                                    $title = $row['name'];
                                    ?>
                                    <option <?php if($id2 == $current_2nd_category) echo "selected = 'selected'" ?> value="<?php echo $id2; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            }
                            else{
                                //category not found
                                ?>
                                <?php
                            }
                            ?>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type = "hidden" name="id" value="<?php echo $id; ?>">
                        <input type = "hidden" name="current_image" value = "<?php echo $current_image; ?>">
                        <input type ="submit" name = "submit" value = "Update movie" class = "btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $current_image = $_POST['current_image'];
                $title = $_POST['title'];
                $year = $_POST['year'];
                $description = $_POST['description'];
                $rate = $_POST['rate'];
                $trailer = $_POST['trailer'];
                $category1 = $_POST['category'];
                $category2 = $_POST['category2'];
                $cast = $_POST['cast'];
                $tag = $_POST['tag'];

                if(isset($_FILES['image']['name'])){
                //get the image info
                $image_title = $_FILES['image']['name'];
                if($image_title !=""){
                    //image is availablae
                    //upload the new image
                        $ext = explode(".",$image_title);
                        $extension = end($ext);
                        $image_title = $title."_".rand(0000,9999).'.'.$extension;
                        $source = $_FILES['image']['tmp_name'];
                        $destination = "images/movies/".$image_title;
    
                        $upload = move_uploaded_file($source,$destination);
    
                        if($upload == false){
                            $_SESSION['upload'] = "<div class='alert alert-danger' role='alert'>Failed to upload Image</div>";
                            echo "<script>window.location.href = 'manage_movies.php'</script>";                            die();
                        }
                        //remove the old image
                        if($current_image != ""){
                            $removePath = "images/movies/".$current_image; 
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
                $sql3 = "UPDATE movies
            SET
                title = \"$title\",
                description = \"$description\",
                cid1 = $category1,
                cid2 = $category2,
                cast = \"$cast\",
                trailer = '$trailer',
                image_name = '$image_title',
                rate = $rate,
                year = $year,
                tag='$tag',
                trailer = '$trailer'
            WHERE
                id = $id";
                $res2 = mysqli_query($conn,$sql3);
                if($res2==true){
                    $_SESSION['update'] = "<div class='alert alert-success' role='alert'>movie updated successfully</div>";
                    echo "<script>window.location.href = 'manage_movies.php'</script>";                }
                else{
                    $_SESSION['remove-failed']= "<div class='alert alert-danger' role='alert'>Failed to update movie</div>";
                    echo "<script>window.location.href = 'manage_movies.php'</script>";                }
            }
        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>