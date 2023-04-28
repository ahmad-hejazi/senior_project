<?php require('partials/menu.php'); 
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
        ?>
        <form action = "" method = "POST">
            <table class="tbl-30">
                
                
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type = "password" name = "new_password" placeholder = "New Password" autofocus class = "input">
                    </td>
                </tr>
                
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type = "password" name = "confirm_password" placeholder="Confirm Password" autofocus class= "input">
                    </td>
                </tr>
                
                <tr>
                    <td colspan = "2">
                        <input type = "hidden" name = "id" value="<?php echo $id; ?>">
                        <input type = "submit" name = "submit" value="Change Password" class ="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        //check if the button is clicked
        //get the data from the form (names)
        $id = $_POST['id'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        
        //sql
        //require 'config.php';
        $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
        $sql = "SELECT * from admin where ID = $id";
        
        $result = mysqli_query($conn,$sql);
        
        
        if($result==true){
            //data available
            $count = mysqli_num_rows($result);
            if($count == 1){
                //user exist
                if($new_password == $confirm_password){
                    //update the password
                    $sql2 = "UPDATE admin  SET password = '$new_password' where ID = $id";
                    $result2 = mysqli_query($conn,$sql2);
                    if($result2==true){
                        //display success
                        $_SESSION['change-psswd']= "<div class='alert alert-success' role='alert'>Password Changed Successfully</div>";
                        header('location: manage_admin.php');
                    }
                    else{
                        //display error
                        $_SESSION['change-psswd']= "<div class='alert alert-danger' role='alert'>failed to Change Password</div>";
                        header('location: manage_admin.php');
                    }
                }
                else{
                    $_SESSION['psswd-not-match']= "<div class='alert alert-danger' role='alert'>Password doesnt match</div>";
                    header('location: manage_admin.php');
                }
                 
            }
            else{
                //user doesnt exist
                $_SESSION['user-not-found']= "<div class='error'>USER NOT FOUND</div>";
                header('location: manage_admin.php');
            }
        }
    }

?>
<?php require('partials/footer.php'); ?>