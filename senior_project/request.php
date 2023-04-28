<?php 
include ('menu.php');
if(!isset($_SESSION['user'])){
    $_SESSION['no-login'];
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    
</head>
<body>
    <?php
if(isset($_GET['msg'])){
    if($_GET['msg']=="success"){
        $_SESSION['request'] = "<div class='alert alert-success' role='alert'>Movie Requested Successfully</div>";
        echo $_SESSION['request'];
        unset($_SESSION['request']);
    }
  
} ?>
    <style>
        body{
            margin-top: 70px;
            background-color: black;
            color: white;
        }
        @media(min-width: 980px) {

        .container{
            display: grid;
            grid-template-columns: repeat(2,1fr);
        }
        .request{
            grid-area: 1/1/2/3;
        }
        .movie_title{
            grid-area: 2/1/3/2;
        }
        .movie_request{
            grid-area: 3/1/4/2;
        }
        .movie_info{
            grid-area: 4/1/5/2;
        }
        .movie_message{
            grid-area: 5/1/6/2;
        }
        .text1{
            grid-area: 2/2/5/3;
        }
        .text2{
            margin-top: 50px;
            grid-area: 5/2/6/3;
        }
        .text1, .text2{
            margin-left: 20px;
            font-size: .95em;
        }
        textarea{
            width: 100%;
        }
        .send-btn{
            grid-area: 6/1/7/2;
            margin-top: 10px;
            margin-left: 70%;
        }
    }
    @media(max-width: 980px){
        .text1 , .text2{
            display: none;
        }
        .send-btn{
            margin-top: 10px;
            margin-left: 80%;
        }
    }
    @media(max-width: 765px){
        .send-btn{
            margin-top: 10px;
            margin-left: 70%;
        }
    }
    .movie_message,.movie_request{
        background: #282828;
            color: #a2a2a2;
            width: 100%;
            border: 0;
            border-radius: 3px;
    }
    .movie_info, .movie_title, .text1,.text2{
        color: #969696;
    }
    </style>
    <?php
    
    ?>
    <form method="POST">
<div class="container">

<h2 class="request" style="color: green;">Movie Request</h2>
<input name="title" type="hidden">
<label for="movie_title" class="movie_title">Movie Title:</label>
<input class="movie_request" name="movie_title" type="text" id="movie_title">
<label for="request_message" class="movie_info"> <br> Request Message (Optional):</label>
<textarea class="movie_message" rows="7" name="request_message" cols="50" id="request_message"></textarea>
<div class="send-btn">
<input class="btn btn-success" name="submit" type="submit" value="Send Request">
</div>
</form>
<div class="text1">
<p>We try our best to upload every request our users make. Sadly we can not give a 100% guarantee that we will upload your movie in a given time frame, but we will try our best!</p>
</div>
<div class="text2">
<p>To help us, please provide as much information about the movie you want to be uploaded. It will help if you can give IMDb links or official trailer links.</p>
</div>
</div>
<?php
$username = $_SESSION["user"];
if(isset($_POST['submit'])){
    $movie = $_POST['movie_title'];
    $info = $_POST['request_message'];
    $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
    $sql1 = "SELECT * from user where username='$username'";
    $res = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($res);
    $uid = $row['id'];
    $sql = "INSERT INTO requests set movie='$movie', comment='$info', uid=$uid";
    $result = mysqli_query($conn,$sql);
    if($result==true){
        $_SESSION['request'] = "<div class='alert alert-success' role='alert'>Movie Requested Successfully</div>";
        echo "<script>window.location.href = 'request.php?msg=success'</script>";
    }
    else{
        $_SESSION['request'] = "<div class='alert alert-danger' role='alert'>Failed To Request Movie</div>";
        echo "<script>window.location.href = 'request.php'</script>";
    }
}
?>

</body>
</html>