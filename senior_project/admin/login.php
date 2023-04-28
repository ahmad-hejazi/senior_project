<html>
<head>
	<meta name="viewpot" content="width=device-width, initial-scale=1.0">
	<meta charset = "utf-8">
	<title>Project</title>
	<link rel="stylesheet" href="login.css";>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;&display=swap" rel="stylesheet">

</head>
<body>
    <center>
	<div class="container">
	    
		<form class ="form" id="login" action ="" method = "post">
			<h1 class="form_title">Login</h1>
			<div class="form_message form_message-error">
			       <?php
				   require 'config.php';
	               if(isset($_SESSION['no-login'])){
	                 echo $_SESSION['no-login'];
	                 unset($_SESSION['no-login']);
    	          }
    	          ?></div>
			<div class="form_input-group">
			    <div class="form_input-error-message">
				
    	          </div>
	            <br>
				<input type="text" class="form_input" autofocus placeholder="Username" name='username'>
				<div class="form_input-error-message">
				    <?php
				   //require 'config.php';
	               if(isset($_SESSION['login'])){
	                 echo $_SESSION['login'];
	                 unset($_SESSION['login']);
    	          }
    	          ?>
				</div>
			</div>
			<div class="form_input-group">
				<input type="password" class="form_input" autofocus placeholder="Password" name="password">
				<div class="form_input-error-message"></div>
			</div>
			<input class="form_button" type="submit" name ="submit" value="Login">
		</form>
		
	</div>
	</center>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $username =strip_tags(addslashes($_POST['username']));
        $password =strip_tags(addslashes($_POST['password']));
        $fullname = "SELECT full_name FROM admin WHERE username = '$username' AND password = '$password'";
        $sql = "SELECT * FROM admin WHERE username='$username' AND password = '$password'";
        require 'config.php';
        $conn = mysqli_connect($server, $user, $pass, $database) or
        die("can't open connection");
        $result = mysqli_query($conn,$sql);
        $full_name_res = mysqli_query($conn,$fullname);
        $full_name_fetch = mysqli_fetch_assoc($full_name_res);
        $full_name = $full_name_fetch['full_name'];
        $count = mysqli_num_rows($result);
        if($count==1){
            //found
            $_SESSION['login'] = "<div class='alert alert-success' role='alert'>Login Successful. Welcome Back <b>$full_name</b>.</div>";
            $_SESSION['admin'] = $username;
            header('location: index.php');
        }
        else{
            //not found
            $_SESSION['login'] = "<div class='alert alert-danger' role='alert'>Username or password did not match.</div>";
            header('location: login.php');
        }
      }
?>
