<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website- User Profile</title>
    <!-- Bootstrap css link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome link-->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
       <img src="../images/logo2.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../users_area/checkout.php">Total Price: <b><?php total_cart_price(); ?>/=</b></a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
            </form>
        </div>
        </nav>

        <?php
            cart();
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                
                <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a href='#' class='nav-link'>Welcome Guest</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item'>
                        <a href='#' class='nav-link'>Welcome ". $_SESSION['username']."</a>
                    </li>";
                    }

                   if(!isset($_SESSION['username'])){
                        echo "<li class='nav_item'>
                        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                        </li>";
                    } else {
                        echo "<li class='nav_item'>
                        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                        </li>";
                    }
                ?>
            </ul>
        </nav>

        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community.</p>
        </div>

        <div class="row">
            <div class="col-md-2">
                 <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light"><h4>Your Profile</h4></a>
                    </li>

                    <?php
                        $username=$_SESSION['username'] ?? '';
                        $user_image= "SELECT * FROM `user_table` WHERE username='$username'";
                        $user_image=mysqli_query($con, $user_image);
                        $row_image=mysqli_fetch_array($user_image);
                        $user_image=$row_image['user_image'];
                        echo " <li class='nav-item '>
                        <img src='./user_images/$user_image' alt='' class='profile_img my-4'>
                     </li>";
                    ?>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link text-light">Pending Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?my_orders" class="nav-link text-light">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?user_login.php" class="nav-link text-light">Logout</a>
                    </li>
                 </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php
                 get_user_order_details();
                 if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                 }
                 if(isset($_GET['my_orders'])){
                    include('user_orders.php');
                 }
                 if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                 }
                ?>
            </div> 
        </div>
       


    <!--footer-->
    <?php
    include('../includes/footer.php');
    ?>

    </div>
    

<!-- Bootstrap js link-->
<script type="text/javascript" src=".\js\bootstrap.min.js"></script>
</body>
</html>