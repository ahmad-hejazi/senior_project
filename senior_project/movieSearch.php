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
$conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");

$records_per_page = 12;
$sql2 = "SELECT COUNT(*) as total FROM movies";
$result_total = mysqli_query($conn, $sql2);
$row_total = mysqli_fetch_assoc($result_total);
$total_records = $row_total['total'];
$sql23 = "";
// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);
        if(isset($_POST['submit'])){
            $sql = "SELECT * from movies WHERE 1";
            if(isset($_POST['search'])){
                $search = $_POST['search'];
                $sql23 .=" AND title LIKE '%$search%'";
            }
            if(isset($_POST['category'])){
                if($_POST['category'] != "all"){
                    $cid = $_POST['category'];
                    $sql23 .= " AND cid1=$cid OR cid2 = $cid";
                }
            }
            
            if(isset($_POST['year'])){
                if($_POST['year'] != "all"){
                    if($_POST['year']=="2020" || $_POST['year']=="2021" || $_POST['year']=="2022" || $_POST['year']=="2023"){
                        $year = $_POST['year'];
                        $sql23 .=" AND year=$year";
                    }
                    elseif($_POST['year']=="15-19"){
                        $minyear = 2015;
                        $maxyear = 2019;
                        $sql23 .=" AND year BETWEEN $minyear AND $maxyear";
                    }
                    elseif($_POST['year']=="10-14"){
                        $minyear = 2010;
                        $maxyear = 2014;
                        $sql23 .= " AND year BETWEEN $minyear AND $maxyear";
                    }
                    elseif($_POST['year']=="00-09"){
                        $minyear = 2000;
                        $maxyear = 2009;
                        $sql23 .=" AND year BETWEEN $minyear AND $maxyear";
                    }
                    elseif($_POST['year']=="50-99"){
                        $minyear = 1950;
                        $maxyear = 1999;
                        $sql23 .=" AND year BETWEEN $minyear AND $maxyear";
                    }
                }
            }
            if(isset($_POST['rate']) && is_numeric($_POST['rate'])){
                if($_POST['rate'] != "all"){
                    $rate = $_POST['rate'];
                    $ratemax = $rate + 1;
                    $sql23 .=  " AND rate BETWEEN $rate AND $ratemax";
                }
            }
            if(isset($_POST['orderby'])){
                if($_POST['orderby']=="latest"){
                    $sql23 .=" ORDER By id DESC";
                }
                elseif($_POST['orderby']=="oldest"){
                    $sql23 .=" ORDER By id ASC";
                }
                elseif($_POST['orderby']=="year"){
                    $sql23 .=" ORDER By year DESC";
                }
                elseif($_POST['orderby']=="rating"){
                    $sql23 .=" ORDER By rate DESC";
                }
            }
            $sql .= $sql23;
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        
        if($count>0){
            //movie is available in the db
            //display movie from the database
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
            echo "<a href='browse.php?page=$i'>$i</a></div> ";
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

        
       <?php if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");

$records_per_page = 12;
$sql2 = "SELECT COUNT(*) as total FROM movies";
$result_total = mysqli_query($conn, $sql2);
$row_total = mysqli_fetch_assoc($result_total);
$total_records = $row_total['total'];
$sql23 = "";
// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);
        if(isset($_POST['submit'])){
            $sql = "SELECT * from movies WHERE 1";
            if(isset($_POST['search'])){
                $search = $_POST['search'];
                $sql23 .="AND title LIKE '%$search%' OR description LIKE '%$search%'";
            }
            if(isset($_POST['category'])){
                if($_POST['category'] != "all"){
                    $cid = $_POST['category'];
                    $sql23 .= " AND cid1=$cid OR cid2 = $cid";
                }
            }
            
            if(isset($_POST['year'])){
                if($_POST['year'] != "all"){
                    if($_POST['year']=="2020" || $_POST['year']=="2021" || $_POST['year']=="2022" || $_POST['year']=="2023"){
                        $year = $_POST['year'];
                        $sql23 .=" AND year=$year";
                    }
                    elseif($_POST['year']=="15-19"){
                        $minyear = 2015;
                        $maxyear = 2019;
                        $sql23 .=" AND year BETWEEN $minyear AND $maxyear";
                    }
                    elseif($_POST['year']=="10-14"){
                        $minyear = 2010;
                        $maxyear = 2014;
                        $sql23 .= " AND year BETWEEN $minyear AND $maxyear";
                    }
                    elseif($_POST['year']=="00-09"){
                        $minyear = 2000;
                        $maxyear = 2009;
                        $sql23 .=" AND year BETWEEN $minyear AND $maxyear";
                    }
                    elseif($_POST['year']=="50-99"){
                        $minyear = 1950;
                        $maxyear = 1999;
                        $sql23 .=" AND year BETWEEN $minyear AND $maxyear";
                    }
                }
            }
            if(isset($_POST['rate']) && is_numeric($_POST['rate'])){
                if($_POST['rate'] != "all"){
                    $rate = $_POST['rate'];
                    $ratemax = $rate + 1;
                    $sql23 .=  " AND rate BETWEEN $rate AND $ratemax";
                }
            }
            if(isset($_POST['orderby'])){
                if($_POST['orderby']=="latest"){
                    $sql23 .=" ORDER By id DESC";
                }
                elseif($_POST['orderby']=="oldest"){
                    $sql23 .=" ORDER By id ASC";
                }
                elseif($_POST['orderby']=="year"){
                    $sql23 .=" ORDER By year DESC";
                }
                elseif($_POST['orderby']=="rating"){
                    $sql23 .=" ORDER By rate DESC";
                }
            }
            $sql .= $sql23;
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        
        if($count>0){
            //movie is available in the db
            //display movie from the database
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
            </div>
        
        </div>
        
        </div>
        </div>
            <?php 
        }
    }
}
    echo "<div style='margin-left:50%'>" ;
for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='browse.php?page=$i'>$i</a> ";
}
echo "</div>"?>
        </div>
<script> 
            const btn = document.querySelector('#expand-btn');
            const select = document.querySelector('#select');
            btn.addEventListener('click', () => {
            select.classList.toggle('visible');
            });
        </script>