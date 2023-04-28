<?php include('partials/menu.php');
?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <br><br>
        
        <?php
            $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
            $id = $_GET['id'];
            $sql = "SELECT * FROM admin WHERE ID = $id";
            $result=mysqli_query($conn,$sql);
            if ($result == true){
                $count = mysqli_num_rows($result);
                if($count==1){
                    $row = mysqli_fetch_assoc($result);
                    
                    $full_name = $row['full_name'];
                    $username = $row ['username'];
                }
                else{
                    header('location: manage_admin.php');
                }
            }
        ?>
        
            <form method = "POST">
                <table class = "tbl-30">
                    <tr>
                        <td>Full name: </td>
                        <td>
                            <input type = "text" name = "full_name" value="<?php echo $full_name; ?>" autofocus  class = "input">
                        </td>
                    </tr>
                
                    <tr>
                        <td>Username: </td>
                        <td>
                        <input tupe ="text" name ="username" value = "<?php echo $username; ?>" autofocus  class = "input">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    
    <?php
        //check if the submit button is clicked
        if(isset($_POST['submit'])){
            //echo "Button Clicked";
            //get the values from the form
            $id = $_POST['id'];
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            
            //create query for update
            require 'config.php';
            $sql = "UPDATE admin SET
            full_name = '$full_name',
            username = '$username'
            WHERE ID = '$id'
            ";
            $result = mysqli_query($conn, $sql);
            if($result == true){
                //success
                $_SESSION['update'] = "<div class='alert alert-success' role='alert'>Admin Updated successfully</div>";
                header('location: manage_admin.php');
            }
            else{
                //failed
                $_SESSION['update'] = "<div class='alert alert-danger' role='alert'>Failed to update admin</div>";
                header('location: manage_admin.php');
            }
        }
    ?>
    
    
<?php include('partials/footer.php');?>