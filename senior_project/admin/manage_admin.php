<?php include('partials/menu.php');
?>
<div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br> <br> <br>
                <?php
                    //session_start();
                    //require 'config.php';
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found'])){
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['psswd-not-match'])){
                        echo $_SESSION['psswd-not-match'];
                        unset($_SESSION['psswd-not-match']);
                    }
                    if(isset($_SESSION['change-psswd'])){
                        echo $_SESSION['change-psswd'];
                        unset($_SESSION['change-psswd']);
                    }
                    ?>
                    <br> <br>
                <a href="add_admin.php" class="btn-primary">Add Admin</a>
                <br> <br> <br>
                
                
                <table class="table-full">
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $sql = "SELECT * from admin";
                        $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
                        $res = mysqli_query($conn,$sql);
                        
                        if($res == true){
                                $count = mysqli_num_rows($res);
                                $sn=1;
                                if($count>0){
                                        //we have data
                                        while($rows = mysqli_fetch_assoc($res)){
                                                $id = $rows['id'];
                                                $full_name = $rows['full_name'];
                                                $username = $rows['username'];
                                                
                                                ?>
                        <tr>
                           <td><?php echo $sn++; ?></td>
                           <td><?php echo $full_name; ?></td>
                           <td><?php echo $username; ?></td>
                           <td>
                            <a href= "change_password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                            <a href="update_admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                            <a href="delete_admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                           </td>
                        </tr>
                                                <?php
                                        }
                                }
                                else{
                                        //we have no data
                                }
                        }
                    ?>
                </table>
            </div>
        </div>

<?php include('partials/footer.php'); ?>