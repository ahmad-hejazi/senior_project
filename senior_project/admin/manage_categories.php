<?php include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Categories</h1>
    
    <br><br>
    <?php
        if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove'])){
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
        }
        if(isset($_SESSION['noCategory'])){
        echo $_SESSION['noCategory'];
        unset($_SESSION['noCategory']);
        }
        if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
        }
        if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
        }
        if(isset($_SESSION['failedRemove'])){
        echo $_SESSION['failedRemove'];
        unset($_SESSION['failedRemove']);
        }
    ?>
    <br><br>
    <a href = '<?php echo "add_categories.php"; ?>' class = "btn-primary">Add Category</a>
    <br><br><br>
    <table class ="table-full">
        <tr>
            <th>ID</th>
            <th><b>Title</b></th>
            <th><b>Image</b></th>
            <th><b>Actions</b></th>
        </tr>
        <?php
            $sql = "SELECT * from categories";
            $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);

            $sn = 1;
            if($count > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['cid'];
                    $title = $row['name'];
                    $image_title = $row['Image_name'];
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                        <?php
                            if($image_title==""){
                                //error:we do not have am image
                                echo "<div class='error'>No image found</div>";
                            }
                            else{
                                //display the image
                                ?>
                                <img src="<?php echo"images/categories/".$image_title; ?>" alt="" width="100px">
                                <?php
                            }
                        ?>
                    </td>
                        <td>
                            <a href = "update_category.php?id=<?php echo $id;?>"class = "btn-secondary">Update Category</a>
                            <a href = "delete_category.php?id=<?php echo $id;?>" class = "btn-danger">Delete Category</a>
                        </td>
                    </tr>   
                <?php

                    
                }
            }
            else{
            
            
               ?>
            <tr><td colspan = "6"><div class='error'>No category added</div></td></tr>
            <?php
            
            }
            ?>
            
        
        
    </table>
    </div>
</div>

<?php include('partials/footer.php') ?>