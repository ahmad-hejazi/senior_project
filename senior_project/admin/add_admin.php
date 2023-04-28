<?php include('partials/menu.php');
?>
<div class="main-content">
    <link rel="stylesheet" href="admin.css">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br> <br>
        <?php
           if(isset($_SESSION['add'])){
               echo $_SESSION['add'] ;
               unset($_SESSION['add']);
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder = "Full name here" autofocus class="input"></td>
                </tr>
                <tr>
                    <td>Userame: </td>
                    <td><input type="text" name="username" placeholder = "Username here" autofocus autofocus class="input"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder = "Enter a password" autofocus class="input"></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>
<?php
     if(isset($_POST['submit'])){
        $full_name = strip_tags(addslashes($_POST['full_name']));
        $username = strip_tags(addslashes($_POST['username']));
        $password = strip_tags(addslashes($_POST['password']));
        require 'config.php';
        $sql = "INSERT INTO admin SET full_name = '$full_name', username='$username', password = '$password'";
        $conn = mysqli_connect($server, $user, $pass, $database) or
        die("can't open connection");
        $result = mysqli_query($conn, $sql) or die("cannot open connection");
        require 'config.php';
        if($result == true){
           $_SESSION['add'] = "<div class='alert alert-success' role='alert'>Admin Added Successfully!</div>";
            header('location: manage_admin.php');
        }
        else{
           $_SESSION['add'] = "<div class='alert alert-danger' role='alert'>Failed To Add Admin</div>";
      }
   }
?>
