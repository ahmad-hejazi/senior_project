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
    <title>feedback</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<?php
if(isset($_GET['msg'])){
  if($_GET['msg']=="success"){
      $_SESSION['feedback'] = "<div class='alert alert-success' role='alert'>Feedback Sent Successfully</div>";
      echo $_SESSION['feedback'];
      unset($_SESSION['feedback']);
  }
}
 ?>
</head>
<body>
    <style>
    body{
        background-color: black;
        color: white;
        margin-top: 70px;
    }
    .container{
        grid-template-columns: 1fr 100px;
        display: grid;
    }
    .feedbackbtn{
        grid-area: 1/2/2/3;
        padding-right: 10%;
        margin-top: 10px;
        z-index: 20;
    }
    </style>

<div class="container">
    <h1 style="border-bottom: 2px solid gray; margin: 0;"> Feedbacks</h1>
    
    <div style=" color: white; ">
    <?php
        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
    $sqlf = "SELECT * FROM feedbacks order by id DESC limit 5";
    $res1234 = mysqli_query($conn,$sqlf);
    $count = mysqli_num_rows($res1234);
    if($count>0){
    while($rowrevs = mysqli_fetch_assoc($res1234)){
      $userid = $rowrevs['uid'];
      $rev = $rowrevs['feedback'];
      $sqluser = "SELECT * from user where id = $userid";
      $res123 = mysqli_query($conn,$sqluser);
      $rowusr = mysqli_fetch_assoc($res123);
      $username = $rowusr['username'];
    ?>
    <h6 style=" margin-left:15px; margin-bottom:15px;"><img src="images/iconUser.png" style="width:25px; height:25px" alt=""><?php echo $username; ?></h6>
    <div class="user-review" style="border-bottom: 2px solid gray;  margin-left:15px; margin-bottom:15px;"><?php echo $rev; ?></div>
    <?php }}
else{
  ?>
  </div>
  <div style=" color: white; ">
    <h5>No Reviews Yet</h5>
  </div>
  <?php
} ?>
</div>

<div class="feedbackbtn" style="border-bottom: 2px solid gray;">
    <button type="button" class="btn" style="color: white; padding: 0;" data-toggle="modal" data-target="#addfeedback"><i class="fas fa-plus"></i>Feedback</button>
</div>
</div>

<div id="addfeedback" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" style="color: black;">Add Feedback</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        
        <textarea id="review" name="review" rows="4" cols="40" placeholder="Write your feedback here"></textarea><br>
        <label for="spoiler" style="margin-left:10px;">Contains spoilers?</label><br>
      </div>
      <div class="modal-footer">
        <?php //data-dismiss="modal" ?>
  <input type="submit" name="submit" class="btn btn-default"   value="submit feedback">
      </div>
      
      </form>
    </div>

  </div>
  
</div>
</body>
</html>
<?php

$username = $_SESSION["user"];
if(isset($_POST['submit'])){
    $feedback = $_POST['review'];
    $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
    $sql1 = "SELECT * from user where username='$username'";
    $res = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($res);
    $uid = $row['id'];
    $sql = "INSERT INTO feedbacks set feedback='$feedback', uid=$uid";
    $result = mysqli_query($conn,$sql);
    if($result==true){
        $_SESSION['feedback'] = "<div class='alert alert-success' role='alert'>Movie Requested Successfully</div>";
        echo "<script>window.location.href = 'feedback.php?msg=success'</script>";
    }
    else{
        $_SESSION['feedback'] = "<div class='alert alert-danger' role='alert'>Failed To Request Movie</div>";
        echo "<script>window.location.href = 'feedback.php'</script>";
    }
}
?>