<?php 
include ('menu.php');


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/detail.css"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Details</title>
</head>
<body>
<style>
    </style>
    <?php
    if(isset($_SESSION['review'])){
      echo $_SESSION['review'];
      unset($_SESSION['review']);
    }
    if(isset($_GET['id'])){
  $id = $_GET['id'];
    
    $sql = "SELECT * from movies WHERE id = $id";
    $conn = mysqli_connect($server, $user, $pass, $database) or
                            die("can't open connection");
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
if($count>0){
    //food is available in the db
    //display movie from the database
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $title = $row['title'];
        $rate = $row['rate'];
        $cast = $row['cast'];
        $description = $row['description'];
        $image_title = $row['image_name'];
        $category1 = $row['cid1'];
        $category2 = $row['cid2'];
        $trailer = $row['trailer'];
        $year = $row['year'];
        $querry = "SELECT * from categories WHERE cid = $category1";
        $result1 = mysqli_query($conn,$querry);
        $row2 = mysqli_fetch_assoc($result1);
        $cat1 = $row2['name'];
        $querry2 = "SELECT * from categories WHERE cid = $category2";
        $result2 = mysqli_query($conn,$querry2);
        $row3 = mysqli_fetch_assoc($result2);
        $cat2 = $row3['name'];
        $sqlrevs = "SELECT * FROM reviews WHERE mid= $id";
        $res123 = mysqli_query($conn,$sqlrevs);
        $count = mysqli_num_rows($res123);
        ?>
    <div class="container1">
        <div class="title"> 
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="image">
            <img class="rounded" id="image" style="margin: 10px;" src="admin/images/movies/<?php echo $image_title ?>">
        </div>
        <div class="year"><h3 style=" color: white; margin-top: 10px;"> - 2022</h3></div>
        <div class="category">
                <a><?php echo $cat1 ?></a> <a><?php echo $cat2 ?></a> 
            </div>
            <div class="rate" style="margin-bottom: 20px; ">
            <p><img src="images/logo-imdb.svg" style=" margin-right:10px;"><?php echo $rate?><i class="fa fa-star"></i></p>
        </div>
        <div class="userrev">
          <p style="font-size: 20px;" >0 reviews</p>
        </div>
        <div class="details">
            <h2 style=" color: white;"><?php echo $year; ?></h2>
            <div class="category" style="margin-bottom:20px;">
            <a><?php echo $cat1 ?></a> <a><?php echo $cat2 ?></a> 
            </div>
            <div class="rate" style="margin-bottom: 20px; ">
            <p><img src="images/logo-imdb.svg" style=" margin-right:10px;"> 6.9<i class="fa fa-star"></i></p>
        </div>
        <div class="userrev">
          <p style="font-size: 20px;" ><?php echo $count ?> reviews</p>
        </div>
        </div>
        <div class="trailer">
            <iframe src="<?php echo $trailer ?>" frameborder="0" style="margin-top: 10px;"></iframe>
        </div>
        <div class="suggestion-section"><p>similar movies</p></div>
        <div class="recommend1">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="recommend2">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="recommend3">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="recommend4">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="summary">
        <h1 style="border-bottom: 2px solid gray;">Plot Summary</h1>
    <p style="border-bottom: 2px solid gray;"><?php echo $description; ?></p>
</div>
<div class="cast">
    <h1 style="border-bottom: 2px solid gray;">Cast</h1>
    <p style="border-bottom: 2px solid gray;"><?php echo $cast ?></p>
</div>
      <?php 
      if(isset($_SESSION['user'])){
        $conn = mysqli_connect($server, $user, $pass, $database) or
        die("can't open connection");
        $user = $_SESSION['user'];
        $query1 = "SELECT * FROM user where username = '$user'";
        $res11 = mysqli_query($conn,$query1);
        while($row = mysqli_fetch_assoc($res11)){
            $uid = $row['id'];
        }
        $mid = $_GET['id'];
        $sqlWatchlist = "SELECT * FROM watchlist where mid=$mid AND uid=$uid";
        $res12 = mysqli_query($conn,$sqlWatchlist);
        $count = mysqli_num_rows($res12);
        if($count==1){
          $added = true;
        }
        else{
          $added = false;
        }
      }
     
      if(!isset($_SESSION['user'])){

      ?>
    <button style="color: white;" onclick ="redirect()" type="button" id="button" class="watchlist"><i class="fa fa-bookmark"></i>
    Add to watchlist</button>
<?php } elseif(isset($_SESSION['user']) && $added==false){

 ?> 
 <button style="color: white;" onclick ="window.location.href='addtoWatchlist.php?id=<?php echo $_GET['id'] ?>'" type="button" id="button" class="watchlist"><i class="fa fa-bookmark"></i>
    Add to watchlist</button>
 <?php
}
  elseif(isset($_SESSION['user']) && $added=="true"){
  ?>
  <button style="color: yellow;" onclick ="window.location.href='removeFromWatchlist.php?id=<?php echo $_GET['id'] ?>'" type="button" id="button" class="watchlist"><i class="fa fa-bookmark"></i>
    Remove From Watchlist</button>
  <?php } ?>
<div class="review">
    <h1 style="border-bottom: 2px solid gray;"> reviews</h1>
    <?php
    $sqlrevs2 = "SELECT * FROM reviews WHERE mid= $id order by id DESC limit 5";
    $res1234 = mysqli_query($conn,$sqlrevs2);
    $count = mysqli_num_rows($res1234);
    if($count>0){
    while($rowrevs = mysqli_fetch_assoc($res1234)){
      $heading1 = $rowrevs['heading'];
      $userid = $rowrevs['uid'];
      $rev = $rowrevs['review'];
      $sqluser = "SELECT * from user where id = $userid";
      $res123 = mysqli_query($conn,$sqluser);
      $rowusr = mysqli_fetch_assoc($res123);
      $username = $rowusr['username'];
    ?>
    <div style=" color: white; ">
    <h6><img src="images/iconUser.png" style="width:25px; height:25px" alt=""><?php echo $username; ?></h6>
    <h5><?php echo $heading1; ?></h5>
    <div class="user-review" style="border-bottom: 2px solid gray;"><?php echo $rev; ?></div>
  </div><?php }}
else{
  ?>
  <div style=" color: white; ">
    <h5>No Reviews Yet</h5>
  </div>
  <?php
} ?>
</div>
<div class="reviewbtn">
  <?php
  if(!isset($_SESSION['user'])){
    ?>
    <button onclick="redirect()" type="button" class="btn myBtn_multi" style="color: white; padding: 0;" data-toggle="modal" data-target="#addreview"><i class="fas fa-plus"></i>Review</button>
  <?php 
  }else{
  ?>
    <button onclick="showForm()" type="button" class="btn myBtn_multi" style="color: white; padding: 0;" data-toggle="modal" data-target="#addreview"><i class="fas fa-plus"></i>Review</button>
    <?php } ?>
  </div>
<?php }}}?>
<div class="addreview" style=" border: 2px; border-radius: 10px;">
<form id="form" style="color:white; border: 2px; border-radius: 10px; background-color: gray; " method="POST">
        <h3 style="margin-left: 10px; ">Add Review</h3>
        <input type="text" id="heading" name="heading" cols="45" placeholder="write a headline"><br>
        <textarea id="review" name="review" rows="4" cols="40" placeholder="Write your review here"></textarea><br>
        <label for="spoiler" style="margin-left:10px;">Contains spoilers?</label><br>
        <input type="radio" style="margin-left:20px;" id="spoiler-yes" name="spoiler" value="yes">
        <label for="spoiler-yes">Yes</label>
        <input type="radio" id="spoiler-no" name="spoiler" value="no">
        <label for="spoiler-no">No</label><br>
        <input style="margin-left:40%;" type="submit" value="Submit" name="submit">
      </form>
</div>
<div class="watchtrailer">
<button type="button" class="btn myBtn_multi btn-success btn-lg" data-toggle="modal" data-target="#watchtrailer">Watch trailer<i class="fa fa-play-circle" style="margin-left: 5px;"></i></button>
    <div class="modal fade" id="watchtrailer" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" style="background: rgba(255, 255, 255, 0.2); border: none; margin-top: 10%;">
            <div class="modal-body">
            <button type="button" class="close close_multi" data-dismiss="modal" style="color:white;">&times;</button>
                <iframe width="700" height="435" src="<?php echo $trailer; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            </div>
          </div>
          
        </div>
      </div>
      </div>
</div>
<div class="container2">
        <div class="title"> 
            <h1><?php echo $title;?></h1>
        </div>
        <div class="image">
            <img class="rounded" id="image" style="margin: 10px;" src="admin/images/movies/<?php echo $image_title; ?>">
        </div>
        <div class="detail">
            <h3 style=" color: white;"><?php echo $year ?></h3>
            <div class="category2" style="margin-bottom:10px;">
                <a><?php echo $cat1; ?></a> <a><?php echo $cat2;?></a> 
            </div>
            <div class="rate2" style="margin: 20px 0; ">
            <p><img src="images/logo-imdb.svg" style=" margin-right:10px;"><?php echo $rate; ?><i class="fa fa-star"></i></p>
        </div>
        <div class="userrev2">
          <p style="font-size: 20px;" ><?php echo $count; ?> reviews</p>
        </div>
        </div>
        <div class="trailer">
            <iframe src="<?php echo $trailer; ?>" frameborder="0" style="margin-top: 10px;"></iframe>
        </div>
        <div class="suggestion-section"><p>similar movies</p></div>
        <div class="recommend5">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="recommend6">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="recommend7">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="recommend8">
        <a href="details.php"><img class="rounded" id="image" src="images/enola holmes_1649.jpg"></a></div>
        <div class="summary"  style="border-bottom: 2px solid gray;">
        <h1 style="border-bottom: 2px solid gray;">Plot Summary</h1>
    <p class="cuttoff"><?php echo $description; ?></p>
    <input class="expand-btn" type="checkbox">
</div>
<div class="cast" style="border-bottom: 2px solid gray;">
    <h1 style="border-bottom: 2px solid gray;">Cast</h1>
    <p class="cuttoff"><?php echo $cast; ?></p>
    <input class="expand-btn" type="checkbox">
</div>
<?php
if(!isset($_SESSION['user'])){

?>
<button style="color: white; border-color: yellow;" onclick ="redirect()" type="button" id="button" class="watchlist"><i class="fa fa-bookmark"></i>
Add to watchlist</button>
<?php } elseif(isset($_SESSION['user']) && $added==false){

?> 
<button style="color: white;" onclick ="window.location.href='addtoWatchlist.php?id=<?php echo $_GET['id'] ?>'" type="button" id="button" class="watchlist"><i class="fa fa-bookmark" ></i>
Add to watchlist</button>
<?php
}
elseif(isset($_SESSION['user']) && $added=="true"){
?>
<button style="color: yellow;" onclick ="window.location.href='removeFromWatchlist.php?id=<?php echo $_GET['id'] ?>'" type="button" id="button" class="watchlist" style="style=color:yellow;"><i class="fa fa-bookmark" style="color: yellow;"></i>
Remove From Watchlist</button>
<?php } ?>

<div class="review">
    <h1 style="border-bottom: 2px solid gray;"> reviews</h1>
    <?php
    $sqlrevs2 = "SELECT * FROM reviews WHERE mid= $id order by id DESC limit 5";
    $res1234 = mysqli_query($conn,$sqlrevs2);
    $count = mysqli_num_rows($res1234);
    if($count>0){
    while($rowrevs = mysqli_fetch_assoc($res1234)){
      $heading1 = $rowrevs['heading'];
      $userid = $rowrevs['uid'];
      $rev = $rowrevs['review'];
      $sqluser = "SELECT * from user where id = $userid";
      $res123 = mysqli_query($conn,$sqluser);
      $rowusr = mysqli_fetch_assoc($res123);
      $username = $rowusr['username'];
    ?>
    <div style=" color: white; ">
    <h6><img src="images/iconUser.png" style="width:25px; height:25px" alt=""><?php echo $username; ?></h6>
    <h5><?php echo $heading1; ?></h5>
    <div class="user-review" style="border-bottom: 2px solid gray;"><?php echo $rev; ?></div>
  </div><?php }}
else{
  ?>
  <div style=" color: white; ">
    <h5>No Reviews Yet</h5>
  </div>
  <?php
} ?>
</div>
<div class="reviewbtn1">
<?php
  if(!isset($_SESSION['user'])){
    ?>
    <button onclick="redirect()" type="button" class="btn myBtn_multi" style="color: white; padding: 0;" data-toggle="modal" data-target="#addreview"><i class="fas fa-plus"></i>Review</button>
  <?php 
  }else{
  ?>
    <button type="button" class="btn" style="color: white; padding: 0;" data-toggle="modal" data-target="#addreview1"><i class="fas fa-plus"></i>Review</button>
<?php }?>
  </div>
<div id="addreview1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" style="color: black;">Add Review</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
      <input type="text" id="heading" name="heading" cols="45" placeholder="write a headline"><br>
        <textarea id="review" name="review" rows="4" cols="40" placeholder="Write your review here"></textarea><br>
        <label for="spoiler" style="margin-left:10px;">Contains spoilers?</label><br>
        <input type="radio" style="margin-left:20px;" id="spoiler-yes" name="spoiler" value="yes">
        <label for="spoiler-yes">Yes</label>
        <input type="radio" id="spoiler-no" name="spoiler" value="no">
        <label for="spoiler-no">No</label><br>
      </div>
      </form>
      <div class="modal-footer">
        <input type="submit" class="btn btn-default" data-dismiss="modal" name="submit" value="submit">
      </div>
    </div>

  </div>
</div>
</div>
<?php
/*if ($condition) {
  echo "<script>document.getElementById('myButton').onclick = functionA;</script>";
} else {
  echo "<script>document.getElementById('myButton').onclick = functionA;</script>";
}*/
?>
<script>
 function showForm() {
  var form = document.getElementById("form");
  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
}
function redirect() {
    window.location = "redirect.php";
  }
    </script>
    </body>


    <?php
    if(isset($_POST['submit'])){
      $heading = $_POST['heading'];
      $review = $_POST['review'];
      if(isset($_POST['spoiler'])){
        $spoiler = $_POST['spoiler'];
      }
      else{
        $spoiler = "No";
      }
      $sqlReview = "INSERT into reviews set review='$review',heading='$heading', mid=$mid, uid=$uid, spoiler='$spoiler' ";
      $resultReview = mysqli_query($conn,$sqlReview);
      if($resultReview){
        $_SESSION['review'] = "<div class = 'success'>Review added Successfully</div>";
        echo "<script>window.location.href = 'details.php?id=$id'</script>";
      }
      else{
        $_SESSION['review'] = "<div class = 'success'>failed to add review</div>";
        echo "<script>window.location.href = 'details.php?id=$id'</script>";
      }
    }
    ?>
</html>