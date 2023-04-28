<?php
    include 'partials/menu.php'
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css"/>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home</title>
</head>
<body>
<div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <?php
	                if(isset($_SESSION['login'])){
	                 echo $_SESSION['login'];
	                 unset($_SESSION['login']);
    	          }
	            ?>

            <br> <br>
                <div class="col-4">
                    <?php
                        $sql="SELECT * FROM categories";
                        $conn = mysqli_connect($server, $user, $pass, $database) or die("can't open connection");
                        $result =mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                    ?>
                    Number Of Categories:
                    <br><br>
                    <h1><?php echo $count; ?></h1><br />
                    
                </div>

                <div class="col-4">
                    <?php
                        $sql2="SELECT * FROM movies";
                        $result2 =mysqli_query($conn,$sql2);
                        $count2 = mysqli_num_rows($result2);
                    ?>
                    Number Of Movies:
                    <br><br>
                    <h1><?php echo $count2; ?></h1><br />
                    
                </div>

                <div class="col-4">
                    <?php
                        $sql3="SELECT * FROM user";
                        $result3 =mysqli_query($conn,$sql3);
                        $count3 = mysqli_num_rows($result3);
                    ?>
                    Number Of Users:
                    <br><br>
                    <h1><?php echo $count3; ?></h1><br />
                    
                </div>

                <div class="col-4">
                    <?php
                        $sql4 = "SELECT * From feedbacks";
                        $result4 =mysqli_query($conn,$sql4);
                        $count4 = mysqli_num_rows($result4);
                    ?>
                    Total Feadbacks:
                    <br><br>
                    <h1><?php echo $count4; ?></h1><br />
                    
                </div>

            </div>
        </div>
        <div class="clearfix">

        </div>
        <?php include('partials/footer.php'); ?>
</body>
</html>