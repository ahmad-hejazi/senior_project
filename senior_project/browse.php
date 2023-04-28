<?php 
include ('menu.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/browse.css"/>
    <title>browse movies</title>
</head>
<body>  
<style>

@media (min-width: 576px) {
    .movie-list-container2{
        display: none;
    }
    .search-bar{
    margin-right: 70%;
}
select{
    -webkit-appearance: none;
    border-radius: 5px;
    padding-left: 10px;
    height: 40px;
    width: 130px;
    border: 0;
    background: url(images/select-arrows.svg) no-repeat 115px 12px #282828;
}
option{
    color: #a2a2a2;
}
.container{
display: grid;
grid-template-columns: repeat(4,1fr) 10%;
grid-template-rows: minmax(20px,60px) minmax(20px,30px) minmax(20px,60px);
}
.search{
    grid-area: 1/1/2/5;
    width: 100%;
}
#search{
    width: 80%;
    height: 40px;
    border-radius: 8px; 
    background: #282828;
}
#search-btn{
    height: 40px; 
    border-radius: 8px;
}
.category{
    grid-area: 2/1/3/2;
}
#category{
    grid-area: 3/1/4/2;
}
.year{
    grid-area: 2/2/3/3
}
#year{
    grid-area: 3/2/4/3;
}
.rate{
    grid-area: 2/3/3/4;
}
#rate{
    grid-area: 3/3/4/4;
}
.order{
    grid-area: 2/4/3/5;
}
#order{
    grid-area: 3/4/4/5;
}
}
@media (max-width: 576px) {
            .movie-list-container{
            display:none;
    }
    .search-bar{
    margin-right: 70%;
}
#select {
  display: none;
}
.expand-btn:checked ~ #select {
  display: grid;
  grid-area: 3/1/4/5;
}
#select.visible {
    display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr 1fr 1fr;
  grid-gap: 10px;
}
select{
    
    border-radius: 5px;
    padding-left: 10px;
    height: 40px;
    width: 130px;
    border: 1px solid white;
    background: url(images/select-arrows.svg) no-repeat 115px 12px #282828;
}
option{
    color: #a2a2a2;
}
.container{
display: grid;
grid-template-rows: 50px 50px 1fr;
}
.search{
    grid-area: 1/1/2/5;
    width: 100%;
}
#search{
    width: 80%;
    height: 40px;
    border-radius: 8px; 
    background: #282828;
}
#search-btn{
    height: 40px; 
    border-radius: 8px;
}
.expand-btn{
appearance:none;
padding: .5em;
cursor: pointer;
margin-top: 1rem;
height: 40px; 
width: 130px;
}
.expand-btn::before{
content: "Filter";
color:white;
height: 40px; 
width: 130px;
border: 1px solid white;
border-radius: 8px; 
background: #282828;
padding: 5px 10px;
}
.category{
    grid-area: 1/1/2/2;
}
#category{
    grid-area: 2/1/3/2;
}
.year{
    grid-area: 1/2/2/3
}
#year{
    grid-area: 2/2/3/3;
}
.rate{
    grid-area: 3/1/4/2;
}
#rate{
    grid-area: 4/1/5/2;
}
.order{
    grid-area: 3/2/4/3
}
#order{
    grid-area: 4/2/5/3;
}

}

    </style>
    <div class="movie-list-container">
    <div class="container">
       <div class="search">
        <form action="movieSearch.php" method="POST">
  <input type="search" id="search" name="search" placeholder="search a movie">
  <input type="submit" name="submit" class="btn btn-success" value="Search" id="search-btn">
  </div>
<div class="category">
  <p style="color: #a5a5a5;" >Genres:</p>
  </div>
  <div id="category">
  <select  name="category">
  <option value="all">All</option>
  <?php
    //display the categories with sql query
    $sql = "SElECT * FROM categories";
    $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
    $result =mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count>0){
        //category found
        while($row=mysqli_fetch_assoc($result)){
            //get the category details
            $id2 = $row['cid'];
            $title = $row['name'];
            ?>
            <option value="<?php echo $id2; ?>"><?php echo $title; ?></option>
            <?php
        }
    }
    ?>
  </select>
  </div>
  <div class="year">
  <p style="color: #a5a5a5;">Year:</p>
  </div>
  <div id="year">
  <select name="year">
    <option value="">All</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option>
    <option value="2020">2020</option>
    <option value="15-19">2015-2019</option>
    <option value="10-14">2010-2014</option>
    <option value="00-04">2000-2004</option>
    <option value="50-99">1950-1999</option>
  </select>
  </div>
  <div class="rate">
  <p style="color: #a5a5a5;" >Rate:</p>
  </div>
  <div id="rate">
  <select id="rate" name="rate">
    <option value="all">All</option>
    <option value="1">1+</option>
    <option value="2">2+</option>
    <option value="3">3+</option>
    <option value="4">4+</option>
    <option value="5">5+</option>
    <option value="6">6+</option>
    <option value="7">7+</option>
    <option value="8">8+</option>
    <option value="9">9+</option>
  </select>
  </div>
  <div class="order">
  <p style="color: #a5a5a5;" >Order By:</p>
  </div>
  <div id="order">
  <select id="orderby" name="orderby">
    <option value="latest">latest</option>
    <option value="oldest">oldest</option>
    <option value="year">Year</option>
    <option value="rating">Rating</option>
  </select>
  </form>
  </div>
</div>
        <div class="movie-list-wrapper">
<div class="movies-list">
<div class="row">
    <div class="col-lg-11 col-md-11 col-sm-11">
    <div class="row">
    <?php 
    if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$records_per_page = 12;
$starting_record = ($page - 1) * $records_per_page;
if(isset($_GET['cid'])){
    $catid = $_GET['cid'];
    $sql = "SELECT * from movies WHERE cid1=$catid OR cid2=$catid ORDER BY id DESC LIMIT $starting_record, $records_per_page";
}
else{
    $sql = "SELECT * from movies ORDER BY id DESC LIMIT $starting_record, $records_per_page";
}


$conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
$result =mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$sql2 = "SELECT COUNT(*) as total FROM movies";
$result_total = mysqli_query($conn, $sql2);
$row_total = mysqli_fetch_assoc($result_total);
$total_records = $row_total['total'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);
if($count>0){
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $title = $row['title'];
        $rate = $row['rate'];
        $image_title = $row['image_name'];
        $category1 = $row['cid1'];
        $category2 = $row['cid2'];
        $year = $row['year'];
        $querry = "SELECT * from categories WHERE cid = $category1";
        $result1 = mysqli_query($conn,$querry);
        $row2 = mysqli_fetch_assoc($result1);
        $cat1 = $row2['name'];
        $querry2 = "SELECT * from categories WHERE cid = $category2";
        $result2 = mysqli_query($conn,$querry2);
        $row3 = mysqli_fetch_assoc($result2);
        $cat2 = $row3['name'];
?>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6" style="margin-bottom: 20px;">
        <div class="movie-list-item">

            <img class="movie-list-item-img" src="admin/images/movies/<?php echo $image_title; ?>" alt="">        
            <span class="movie-list-item-title"><?php echo $title; ?></span>
            <p class="movie-list-item-desc"><i class="fas fa-star"><?php echo $rate; ?></i></p>
            <a href="details.php?id=<?php echo $id; ?>"><button class="movie-list-item-button">View details</button></a>
        </div>
        </div>

        <?php 
        
    }
    
}
echo "<div style='margin-left:590px'>" ;
if($count=$records_per_page){
    if(isset($_GET['cid'])){
    for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='browse.php?page=$i&&cid=$catid'>$i</a> ";
    }
    echo "</div>";
}
    else{
        for ($i=1; $i<=$total_pages; $i++) {
            echo "<a class='page' href='browse.php?page=$i'>$i</a></div> ";
            }
    }

}

mysqli_close($conn);?>
    <div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="movie-list-container2">
<div class="container">
       <div class="search">
        <form action="movieSearch.php" method = "POST">
  <input type="search" id="search" name="search" placeholder="search a movie">
  <input type="submit" name="submit" class="btn btn-success" value="Find" id="search-btn">
  </div>
  <input class="expand-btn" type="checkbox">
  <div id="select" style="margin-bottom: 20px;">
<div class="category">
  <p style="color: #a5a5a5;" >Genres:</p>
  </div>
  <div id="category">
  <select  name="category">
  <option value="all">All</option>
  <?php
    //display the categories with sql query
    $sql = "SElECT * FROM categories";
    $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
    $result =mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count>0){
        //category found
        while($row=mysqli_fetch_assoc($result)){
            //get the category details
            $id2 = $row['cid'];
            $title = $row['name'];
            ?>
            <option value="<?php echo $id2; ?>"><?php echo $title; ?></option>
            <?php
        }
    }
    ?>
    
  </select>
  </div>
  
  <div class="year">
  <p style="color: #a5a5a5;">Year:</p>
  </div>
  <div id="year">
  <select name="year">
  <option value="all">All</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option>
    <option value="2020">2020</option>
    <option value="15-19">2015-2019</option>
    <option value="10-14">2010-2014</option>
    <option value="00-09">2000-2009</option>
    <option value="50-99">1950-1999</option>
  </select>
  </div>
  <div class="rate">
  <p style="color: #a5a5a5;" >Rate:</p>
  </div>
  <div id="rate">
  <select id="rate" name="rate">
    <option value="all">All</option>
    <option value="1">1+</option>
    <option value="2">2+</option>
    <option value="3">3+</option>
    <option value="4">4+</option>
    <option value="5">5+</option>
    <option value="6">6+</option>
    <option value="7">7+</option>
    <option value="8">8+</option>
    <option value="9">9+</option>
  </select>
  </div>
  <div class="order">
  <p style="color: #a5a5a5;" >Order By:</p>
  </div>
  <div id="order">
  <select id="orderby" name="orderby">
    <option value="latest">latest</option>
    <option value="oldest">oldest</option>
    <option value="year">Year</option>
    <option value="rating">Rating</option>
  </select>
  </form>
  </div>
  </div>
</div>
        <?php 
    if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$records_per_page = 6;
$starting_record = ($page - 1) * $records_per_page;
if(isset($_GET['cat'])){
    $catid = $_GET['cat'];
    echo $catid;
    $sql  = "SELECT * from movies WHERE cid1=$catid OR cid2=$catid ORDER BY id DESC LIMIT $starting_record, $records_per_page";
}
else{
    $sql = "SELECT * from movies ORDER BY id DESC LIMIT $starting_record, $records_per_page";
}
$conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
$result =mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$sql2 = "SELECT COUNT(*) as total FROM movies";
$result_total = mysqli_query($conn, $sql2);
$row_total = mysqli_fetch_assoc($result_total);
$total_records = $row_total['total'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);
if($count>0){
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $title = $row['title'];
        $rate = $row['rate'];
        $image_title = $row['image_name'];
        $category1 = $row['cid1'];
        $category2 = $row['cid2'];
        $year = $row['year'];
        $querry = "SELECT * from categories WHERE cid = $category1";
        $result1 = mysqli_query($conn,$querry);
        $row2 = mysqli_fetch_assoc($result1);
        $cat1 = $row2['name'];
        $querry2 = "SELECT * from categories WHERE cid = $category2";
        $result2 = mysqli_query($conn,$querry2);
        $row3 = mysqli_fetch_assoc($result2);
        $cat2 = $row3['name'];
?>
        <div class="movie-list-wrapper">
        <div class="movies-list">
        <div style="margin-bottom: 20px;">
        <div class="movie-list-item">
            <a href="details.php?id=<?php echo $id; ?>"><img class="movie-list-item-img" src="admin/images/movies/<?php echo $image_title; ?>" alt=""></a>     
            <span class="movie-list-item-title"><?php echo $title; ?></span>
            <p class="movie-list-item-desc"><i class="fas fa-star"><?php echo $rate; ?></i></p>
            <a href="details.php?id=<?php echo $id; ?>"><button class="movie-list-item-button">View details</button></a>
    </div>
    </div>
        </div>
        </div>
            <?php 
        }
    }
        echo "<ul class='paging'></ul>";
    echo "<div style='margin-left:30%; margin-bottom:10px;'>" ;
for ($i=1; $i<=$total_pages; $i++) {
    echo "<li style='width:20px;'><a class='page' style='width:100%;' href='browse.php?page=$i'>$i</a> </li>";
}
echo "</div>"?>
        </div>
                <style>
                    ul{
                        margin: 25px 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
    font-size: 14px;
    list-style-type: none;
    display: inline-block;
                    }
                    li{
                        display: inline-block;
    margin: 0;
    padding: 0;
    margin-left: 5px;
                    }
                    .page{
                        color: #fff;
    background: #5da93c;
    border-color: #5da93c;
                    }
        </style>
</body>
</html>