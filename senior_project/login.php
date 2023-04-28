<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
          <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
  
    <div class="wrapper">
        <div class="form-wrapper sign-in">
          <form method="POST">
            <h2>Sign In</h2>
            <?php
  require 'config.php';
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login'])){
      echo $_SESSION['no-login'];
      unset($_SESSION['no-login']);
   }
    ?>
            <div class="input-group">
              <input type="text" required name = "username">
              <label for="">Username</label>
            </div>
            <div class="input-group">
              <input type="password" required name="password">
              <label for="">Password</label>
            </div>
            <button type="submit" name = "submit1">Sign In</button>
            <div class="signUp-link">
              <p>Don't have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
            </div>
            <div class="social-platform">
              <p>Or sign in with</p>
              <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-google"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
              </div>
            </div>
          </form>
        </div>
    
        <div class="form-wrapper sign-up">
          <form method="POST">
            <h2>Sign Up</h2>
            <div class="input-group">
              <input type="text" required name="newUsername">
              <label for="">Username</label>
            </div>
            <div class="input-group">
              <input type="email" required name="email">
              <label for="">Email</label>
            </div>
            <div class="input-group">
              <input type="password" required name="newPassword">
              <label for="">Password</label>
            </div>
            <div class="input-group">
                <input type="password" required name="confirmNewPass">
                <label for="">Confirm Password</label>
              </div>
            <div class="remember">
              <label><input type="checkbox" name="agree"> I agree to the terms & conditions</label>
            </div>
            <button type="submit" name="submit2">Sign Up</button>
            <div class="signUp-link">
              <p>Already have an account? <a href="#" class="signInBtn-link">Sign In</a></p>
            </div>
          </form>
        </div>
      </div>
      <script>
        const signUpBtnLink = document.querySelector('.signUpBtn-link');
        const signInBtnLink = document.querySelector('.signInBtn-link');
        const wrapper = document.querySelector('.wrapper');

    signUpBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
    });

    signInBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
    });
      </script>

      <?php
      if(isset($_POST['submit1'])){
          $username =strip_tags(addslashes($_POST['username']));
          $password =strip_tags(addslashes($_POST['password']));
          $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
          $sql3 = "SELECT * FROM user WHERE username='$username' AND password='$password'";
          $result2 = mysqli_query($conn,$sql3);
          $count = mysqli_num_rows($result2);
          if($count==1){
            $_SESSION['login'] = "<div class='alert alert-success' role='alert'>Welcome Back <b>$username</b>.</div>";
            $_SESSION['user'] = $username;
            header('location: index.php');
          }
          else{
            $_SESSION['login'] = "<div class='alert alert-danger' role='alert'>Username incorrect</div>";
            header('location: login.php');
          }
      }

      if(isset($_POST['submit2'])){
        if(isset($_POST['agree'])){
          $newUsername = strip_tags(addslashes($_POST['newUsername']));
          $newPassword = strip_tags(addslashes($_POST['newPassword']));
          $email = strip_tags(addslashes($_POST['email']));
          $confirmNewPass = strip_tags(addslashes($_POST['confirmNewPass']));
          $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
          $sql = "SELECT * from user";
          $res = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $usr = $row['username'];
            $pas = $row['password'];
            $mail = $row['Email'];
            if($newUsername==$usr){
              $_SESSION['login'] = "<script>alert('username already taken');</script>";
              header('location: login.php');
            }
            elseif($mail == $email){
              $_SESSION['login'] = "<script>alert('email already in use');</script>";
              header('location: login.php');
            }
            elseif($newPassword != $confirmNewPass){
              $_SESSION['login'] = "<script>alert('Please Confirm Your Password');</script>";
              header('location: login.php');
            }
            else{
              $sql2 = "INSERT INTO  user SET Email = '$email', username='$newUsername', password = '$newPassword'";
              $result = mysqli_query($conn, $sql2);
              if($result == true){
                $_SESSION['add'] = "<div class='success'>Signed Up Successfully, Please Login Now</div>";
                 header('location: login.php');
             }
            }
          }
        }
        else{
          $_SESSION['login'] = "<div class='alert alert-danger' role='alert'>Please agree to our terms and conditions</div>";
            header('location: login.php');
        }
        
      }
      
      ?>
</body>
</html>