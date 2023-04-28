<?php 
include ('menu.php');
if(isset($_SESSION['login'])){
  echo $_SESSION['login'];
  unset($_SESSION['login']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesheet.css"/>
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
    <title>Movie Station</title>
</head>
<body>
    
      <div class="movie-list-container">
                <h1 class="movie-list-title">NEW RELEASES</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                    <?php
              $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
                $sql2 = "SELECT * FROM movies Order by id desc LIMIT 9 ";
                $res = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res);
                if($count2>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $rate = $row['rate'];
                        $description = $row['description'];
                        $cast = $row['cast'];
                        $year = $row['year'];
                        $image_title = $row['image_name'];
                    
                        ?>
                        <div class="movie-list-item">
                            <a href="details.php?id=<?php echo $id; ?>"><img class="movie-list-item-img" src="admin/images/movies/<?php echo $image_title ?>" alt=""></a>
                            <span class="movie-list-item-title"><?php echo $title; ?></span>
                            <p class="movie-list-item-desc"><?php echo $rate;?></p>
                                <a href="details.php?id=<?php echo $id; ?>"><button class="movie-list-item-button">View details</button></a>
                        </div>
                        <?php }}?>
                        </div>
                        <i class="fas fa-chevron-right arrow"></i>
                        </div>
                        
                 </div>
                 <section class="category" id="category">

<h2 class="section-heading">Category</h2>

<div class="category-grid">

<?php
            $sql = "SELECT * from categories LIMIT 8";
            $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            
            if($count > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['cid'];
                    $title = $row['name'];
                    $image_title = $row['Image_name'];
                    $sql2 = "SELECT * from movies where cid1 = $id OR cid2 = $id";
            $res = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res);
                    ?>
  <div class="category-card">
    
  <a href="browse.php?cid=<?php echo $id; ?>"><img src="admin/images/categories/<?php echo $image_title; ?>" alt="" class="card-img"></a>
    <div class="name"><a style="text-decoration: none; color: white" href="browse.php?cid=<?php echo $id; ?>&&page=1"><?php echo $title; ?></a></div>
    <div class="total"><?php echo $count2; ?></div>
  </div>
<?php } } ?>

</div>

</section>
   <script>
    const arrows = document.querySelectorAll(".arrow");
const movieLists = document.querySelectorAll(".movie-list");

arrows.forEach((arrow, i) => {
  const itemNumber = movieLists[i].querySelectorAll("img").length;
  let clickCounter = 0;
  arrow.addEventListener("click", () => {
    const ratio = Math.floor(window.innerWidth / 270);
    clickCounter++;
    if (itemNumber - (4 + clickCounter) + (4 - ratio) >= 0) {
      movieLists[i].style.transform = `translateX(${
        movieLists[i].computedStyleMap().get("transform")[0].x.value - 240
      }px)`;
    } else {
      movieLists[i].style.transform = "translateX(0)";
      clickCounter = 0;
    }
  });

  console.log(Math.floor(window.innerWidth / 270));
});
   </script>
</body>
</html>