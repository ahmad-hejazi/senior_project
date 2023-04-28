<?php 
include('menu.php');
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
    <title>watchlist</title>
</head>
<body>
    <style>
        *{
            margin:0;
        }
        body{
            background-color: black;
        }
        .summary p{
            --max-lines: 3;
            display: -webkit-box;
            overflow: hidden;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: var(--max-lines);
}
@media (min-width:665px) {
    .container{
        display: none;
    }
}
@media (max-width:665px) {
    .row{
        display:none;
    }
    .container{
        display:flex;
        margin-top:70px;
        border-bottom: solid 1px gray;
    }
    #image{
        float: left;
    }
    #details{
       text-align: justify;
    }
    
}
    </style>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $records_per_page = 18;
    $starting_record = ($page - 1) * $records_per_page;
    $conn = mysqli_connect($server, $user, $pass, $database) or
    die("can't open connection");
    $username = $_SESSION['user'];
    $query1 = "SELECT * FROM user where username = '$username'";
    $res1 = mysqli_query($conn,$query1);
    while($row = mysqli_fetch_assoc($res1)){
        $uid = $row['id'];
    }
    $sql = "SELECT * from watchlist where uid=$uid ORDER BY id DESC LIMIT $starting_record, $records_per_page";
    $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
    $result =mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    $sql2 = "SELECT COUNT(*) as total FROM watchlist";
    $result_total = mysqli_query($conn, $sql2);
    $row_total = mysqli_fetch_assoc($result_total);
    $total_records = $row_total['total'];
    
    // Calculate the total number of pages
    $total_pages = ceil($total_records / $records_per_page);
    if($count>0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $mid = $row['mid'];
            $sqlmovie = "SELECT * from movies where id = $mid";
            $resmovie = mysqli_query($conn,$sqlmovie);
            while($row2=mysqli_fetch_assoc($resmovie)){
                $title = $row2['title'];
                $rate = $row2['rate'];
                $image_title = $row2['image_name'];
                $category1 = $row2['cid1'];
                $category2 = $row2['cid2'];
                $description = $row2['description'];
                $year = $row2['year'];
                $querry = "SELECT * from categories WHERE cid = $category1";
                $result1 = mysqli_query($conn,$querry);
                $row3 = mysqli_fetch_assoc($result1);
                $cat1 = $row3['name'];
                $querry2 = "SELECT * from categories WHERE cid = $category2";
                $result2 = mysqli_query($conn,$querry2);
                $row4 = mysqli_fetch_assoc($result2);
                $cat2 = $row4['name'];
                
    ?>
    <div class="row" style="margin-top:70px;">
    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10" id="container" style="border-bottom: solid 1px gray; ">
        <div class="row">
            <div class="col-xl-1-half col-lg-1-half col-md-1-half col-sm-1-half col-xs-1-half" id="image" style="border-bottom: 1px gray;">
                <a href="details.php"><img src="admin/images/movies/<?php echo $image_title; ?>" class="rounded" style="width:96px; height: 142px;"></a>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-10" id="details">
              <h3 style="margin: 0;color: white; "><a href="details.php" style="text-decoration: none; color: white;"><?php echo $title; ?></a></h3>
                <p style="margin: 0; color: #a2a2a2;" ><span><?php echo $year; ?> |</span> <span><?php echo $cat1. " " . $cat2; ?></span></p>
                <div class="rate" style="width:35px; height: 15px; margin-bottom: 2px; ">
                <p><i class="fas fa-star" style="height:15px; color: #a5a5a5;"><?php echo $rate; ?></i></p>
                </div>
                <div class="summary">
                <p class="cuttoff" style="color: white;" ><?php echo $description; ?></p>
                </div>
            </div>
        </div>
        </div>
        
        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    </div>

    <div class="container">
    <?php
    $records_per_page = 1;
    ?>
    <div id="image" style=" margin-right: 2%;">
                <a href="details.php"><img src="admin/images/movies/<?php echo $image_title; ?>" class="rounded" style="width:96px; height: 142px;"></a>
            </div>
            <div id="details">
              <h3 style="margin: 0;color: white; "><a href="details.php" style="text-decoration: none; color: white;"><?php echo $title; ?></a></h3>
                <p style="margin: 0; color: #a2a2a2;" ><span><?php echo $year;?> |</span> <span><?php echo $cat1. " " . $cat2; ?></span></p>
                <div class="rate" style="width:35px; height: 15px; margin-bottom: 2px; ">
                <p><i class="fas fa-star" style="height:15px; color: #a5a5a5;"><?php echo $rate; ?></i></p>
                </div>
                <div class="summary">
                <p class="cuttoff" style="color: white;" ><?php echo $description; ?></p>
                
                </div>
                
            </div>
    </div>
    <?php }}} 
    echo "<div style='margin-left:50%'>" ;
    for ($i=1; $i<=$total_pages; $i++) {
        echo "<a href='watchlist.php?page=$i'>$i</a>";
    }
    echo "</div> ";
    mysqli_close($conn);
    ?>
</body>
</html>