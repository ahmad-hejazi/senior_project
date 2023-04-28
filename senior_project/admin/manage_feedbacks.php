<?php include('partials/menu.php');
?><?php include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
    <h1>feedbacks</h1>
    <br> <br> <br>
    <?php
    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    ?>
    <br><br>
                <table class="table-full">
                    <tr><th>id</th>
                        <th>username</th>
                        <th>feedback</th>
                    </tr>
                    
                    <?php
                        $sql = "SELECT * from feedbacks ";
                        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        $sn = 1;
                        
                        if($count>0){
                            while($row=mysqli_fetch_assoc($result)){
                                $username = $row['uid'];
                                $feedback = $row['feedback'];
                                $sql1 = "SELECT * from user where id='$username'";
                                $res = mysqli_query($conn,$sql1);
                                $row1 = mysqli_fetch_assoc($res);
                                $usr = $row1['username'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $usr; ?></td>
                                    <td><?php echo $feedback; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            echo "<tr><td colspan='12'class='alert alert-danger' role='alert'>There is no feedbacks yet :(</td></tr>";
                        }
                    ?>
                    
                
                </table>
    </div>
</div>

<?php include('partials/footer.php') ?>
