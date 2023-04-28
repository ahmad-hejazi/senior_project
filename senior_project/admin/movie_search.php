<?php include('partials/menu.php');
?>
<br><br><br><br>
<!-- movie sEARCH Section Starts Here -->
            <?php
            $search = $_POST['search'];
            ?>
            <h2>Movies on Your Search <a href="#" class="text-white">"<?php echo $search ?>"</a></h2>
            
            <table class="table-full">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Rate</th>
        <th>1st Category</th>
        <th>2nd Category</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php
        ///sql query to get the food from db
        $sql = "SELECT * FROM movies WHERE title LIKE '%$search%'";
        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        $sn = 1;
        
        if($count>0){
            //food is available in the db
            //display movie from the database
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $title = $row['title'];
                $rate = $row['rate'];
                $image_title = $row['image_name'];
                $category1 = $row['cid1'];
                $category2 = $row['cid2'];
                $year = $row['year'];
                $querry = "SELECT * from categories WHERE cid = $category1";
                $result1 = mysqli_query($conn,$querry);
                $row2 = mysqli_fetch_assoc($result1);
                $cat1 = $row2['name'];
                $querry2 = "SELECT * from categories WHERE cid = $category2";
                $result2 = mysqli_query($conn,$querry2);
                $row3 = mysqli_fetch_assoc($result2);
                $cat2 = $row3['name'];
                ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $rate; ?></td>
                    <td><?php echo $cat1; ?></td>
                    <td><?php echo $cat2; ?></td>
                    <td>
                        <?php
                            if($image_title==""){
                                //error:we do not have am image
                                echo "<div class='error'>No image found</div>";
                            }
                            else{
                                //display the image
                                ?>
                                <img src="<?php echo"images/movies/".$image_title; ?>" alt="" width="100px">
                                <?php
                            }
                        ?>
                    </td>
                    <td>
                        <a href="update_movie.php?id=<?php echo $id; ?>" class="btn-secondary">Update movie</a>
                        <a href="delete_movie.php?id=<?php echo $id; ?>&image_title=<?php echo $image_title; ?>" class="btn-danger">Delete movie</a>
                    </td>
            </tr>
                <?php
            }
        }
        else{
            //no food in the db
            echo "<tr><td colspan ='7' class = 'error'>Movies Not Added Yet</td></tr>";
        }
    ?>
</table>
    </div>
</div>
<?php include('partials/footer.php') ?>