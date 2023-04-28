<?php include('partials/menu.php');
?><?php include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
    <h1>Requests</h1>
    <br> <br> <br>
    <?php
    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    ?>
    <br><br>
                <table class="table-full">
                    <tr><th>Priority</th>
                        <th>Movie Name</th>
                        <th>Username</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>change status</th>
                    </tr>
                    
                    <?php
                        $sql = "SELECT requests.id, requests.movie, requests.comment,requests.status, user.username username from requests inner join user on user.id = requests.uid ORDER BY status DESC";
                        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        $sn = 1;
                        if($count>0){
                            while($row=mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $movie = $row['movie'];
                                $comment = $row['comment'];
                                $status = $row['status'];
                                $username = $row['username'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $movie; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $comment; ?></td>
                                    <td><?php if($status=="Pending"){echo "<label style='color: red;'>$status</label>";} else{echo "<label style='color: green;'>$status</label>";} ?></td>
                                    <?php
                                    if($status == "Pending"){
                                    ?>
                                    <td>
                                        <a href = "update_requests.php?id=<?php echo $id;?>"class = "btn-secondary">Set as Done</a>
                                    </td>
                                    <?php }?>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            echo "<tr><td colspan='12'class='alert alert-danger' role='alert'>There is no Requests yet :(</td></tr>";
                        }
                    ?>
                    
                
                </table>
    
    
    </div>
</div>

<?php include('partials/footer.php') ?>