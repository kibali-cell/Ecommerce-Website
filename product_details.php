<?php
    include('includes/connect.php');
    include('functions/common_function.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <!-- Bootstrap css link-->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- font awesome link-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
       <img src="./images/logo2.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Total Price: <b><?php total_cart_price(); ?>/=</b></a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
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

        <div class="row px-1">
            <div class="col-md-10">
                <!--Products-->
                <div class="row"> 
                    <!--fetching products-->
                    
                    <?php
                        //calling functions
                        viewDetails();
                        get_unique_categories();
                        get_unique_brands();
                    ?>
                

                    <!--row end-->
                </div>
                <!--col end-->
            </div>
            
            <!--Side Nav-->
            <div class="col-md-2 bg-secondary p-0">
                <!--Brands-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>
                    <?php
                    
                    getbrand();
                    ?>
                </ul>

                <!--Categories-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    <?php
                    
                    getcategories();
                    ?>
                </ul>
            </div>

        </div>


    <!--footer-->
        <div class="bg-info p-3 text-center">
            <p>All rights reserved. Designed by <a href="#" class="name">Jonas Kiwia</a> - 2023</p>
        </div> 

    </div>
    

<!-- Bootstrap js link-->
<script type="text/javascript" src=".\js\bootstrap.min.js"></script>
</body>
</html>