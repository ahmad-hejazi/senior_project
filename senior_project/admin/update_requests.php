<?php
include('config.php'); 
    //check ig the id and image title are passed
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
        $sql2 = "UPDATE requests set status='Done' WHERE id=$id";
        $res = mysqli_query($conn,$sql2);
if($res==true){
    $_SESSION['update'] = "<div class='alert alert-success' role='alert'>Status Updated Successfully</div>";
    header('location: manage_requests.php');
}
else{
    $_SESSION['update'] = "<div class='alert alert-danger' role='alert'>Failed To Update Status</div>";
    header('location: manage_requests.php');
}
}
?>