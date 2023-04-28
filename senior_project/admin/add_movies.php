<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add movie</h1>
        <br><br>
        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'] ;
                unset($_SESSION['upload']);
            }
        ?>       
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title" autofocus class="input">
                    </td>
                </tr>
                <tr>
                    <td>year: </td>
                    <td>
                        <input type="number" name="year" placeholder="year" autofocus class="input">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" style="width: 100%; height: 300px;" class="input" cols="200" rows="20" placeholder="Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>cast: </td>
                    <td>
                    <textarea name="cast" style="height: 100px; width: 100%;" id="" class="input" cols="200" rows="20" placeholder="cast"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>tag: </td>
                    <td>
                    <textarea name="tag" style="height: 100px; width: 100%;" id="" class="input" cols="60" rows="20" placeholder="tag"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>trailer: </td>
                    <td>
                        <input type="text" name="trailer" class="input">
                    </td>
                </tr>
                <tr>
                    <td>rate: </td>
                    <td>
                        <input type="number" name="rate" class="input" step=".1">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image" class="input">
                    </td>
                </tr>
                <tr>
                    <td>1st&nbsp;Category: </td>
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
                                    <option value="<?php echo $id1; ?>"><?php echo $title; ?></option>
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
                    <td>2nd&nbsp;Category: </td>
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
                                    <option value="<?php echo $id2; ?>"><?php echo $title; ?></option>
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
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add movie" class="btn-secondary">
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
            $year = $_POST['year'];
            $description = trim($_POST['description']);
            $cast =  trim($_POST['cast']);
            $trailer = $_POST['trailer'];
            $rate = $_POST['rate'];
            $category = $_POST['category'];
            $category2 = $_POST['category2'];
            $tag= $_POST['tag'];
            if(isset($_FILES['image']['name'])){
                $image_title = $_FILES['image']['name'];
                if($image_title!=""){
                    //image is seleceted
                    //get the extension of the image
                    $ext = explode(".",$image_title);
                    $extension = end($ext);
                    $image_title = $title."_".rand(0000,9999).'.'.$extension;
                    $src = $_FILES['image']['tmp_name'];
                    $dst = "images/movies/".$image_title;
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
            //create query to add food to db
            $sql2 = "INSERT INTO movies (title , year , rate , image_name , description , cid1, cid2 , cast , trailer, tag) VALUES (\"$title\" , $year,$rate,\"$image_title\",\"$description\",\"$category\",\"$category2\",\"$cast\",\"$trailer\",'$tag')";
            $res = mysqli_query($conn,$sql2);
            if($res==true){
                //data inserted
                $_SESSION['add'] = "<div class='alert alert-success' role='alert'>movie Added Successfully</div>";
                echo "<script>window.location.href = 'manage_movies.php'</script>";
            }
            else{
                //data not inserted
                $_SESSION['add'] = "<div class='alert alert-danger' role='alert'>Failed to Add movie</div>";
                echo "<script>window.location.href = 'manage_movies.php'</script>";
            }
        }
        ?>
    </div>
</div>
<?php include('partials/footer.php');?>