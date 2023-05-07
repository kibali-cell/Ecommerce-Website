<?php
    include('../includes/connect.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website-Checkout Page</title>
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
                <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_registration.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
            </form>
        </div>
        </nav>

        

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
                        <a class='nav-link' href='./user_login.php'>Login</a>
                        </li>";
                    } else {
                        echo "<li class='nav_item'>
                        <a class='nav-link' href='./logout.php'>Logout</a>
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
            <div class="col-md-12">
                <!--Products-->
                <div class="row">
                    <?php
                        if(!isset($_SESSION['username'])){
                            include('user_login.php');
                        } else {
                            include('payment.php');
                        }
                    ?>

                    <!--row end-->
                </div>
                <!--col end-->
            </div>
            
            <!--Side Nav-->   
        </div>


    <!--footer-->
       <?php include("../includes/footer.php");?>

    </div>
    

<!-- Bootstrap js link-->
<script type="text/javascript" src=".\js\bootstrap.min.js"></script>
</body>
</html>