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
    <title>E-commerce Website - Cart Details</title>
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
                <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>
            </ul>
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

        <!--Table-->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                   
                        <!-- displying dynamic data -->

                        <?php
                        
                        global $con;
                        $get_ip_add = getIPAddress();
                        $total_price=0;
                        $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count=mysqli_num_rows($result);
                        if($result_count>0){

                         echo  " <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>";
                        
                        while($row=mysqli_fetch_array($result)){
                            $product_id = $row['product_id'];
                            $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);   
                    
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price=array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_image1=$row_product_price['product_image1'];
                                $product_values=array_sum($product_price);
                                $total_price+=$product_values;
                          
                        
                        ?>

                        <tr>
                            <td><?php echo $product_title;?></td>
                            <td><img src="./images/<?php echo $product_image1;?>" alt="<?php $product_title;?>" class="cart_img"></td>
                            <td><input type="number"min="1"max="100" name="quantity[<?php echo $product_id?>]" id="qty_input" class="form-input w-50"></td>
                            <?php
                            
                            $get_ip_add = getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities=mysqli_real_escape_string($con, $_POST['quantity'][$product_id]);

                                if(is_numeric($quantities)){
                                    $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE product_id='$product_id'";
                                    $result_products_quantity=mysqli_query($con, $update_cart);
                                } else {
                                    echo "Invalid Quantity";
                                }
                                
                                
                                $total_price= $total_price*$quantities;
                            } else {
                                echo "Wrong Input";
                            }

                            ?>
                            <td><?php echo $price_table;?>/=</td>
                            <td><input type="checkbox" name="remove_item" value="<?php echo $product_id; ?>"></td>
                            <td>
                                <button type="submit" name="update_cart" id="select_check"  class="bg-info px-3 py-2 border-0 mx-3 text-light">Update Cart</button>
                                <input type="submit" name="remove_cart" value="Remove Cart" class="bg-secondary px-3 py-2 border-0 mx-3 text-light">
                            </td>
                        </tr>
                        <?php
                          }
                        }
                    }
                    else{
                        echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                    }
                        ?>
                    </tbody>
                </table>
                
                <div class="d-flex mb-4">
                    <?php
                    
                    
                    $get_ip_add = getIPAddress();
                    $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo "
                         <h4 class='px-3'>Subtotal: <strong class='text-info'> $total_price/=</strong> </h4>
                         <input type='submit' name='continue_shopping' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3 text-light'>
                         <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>CheckOut</a></button>";
                    } else {
                      echo   "<input type='submit' name='continue_shopping' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3 text-light'>";
                    }

                    if(isset($_POST['continue_shopping'])){
                        echo"<script>window.open('index.php', '_self')</script>";
                    }
                    ?>
                   
                </div>
            </div>
        </div>
        </form>


        <?php
        function remove_cart_item(){
            global $con;
            if(isset($_POST['remove_cart'])){
                foreach((array)$_POST['remove_item'] as $remove_id){
                    echo $remove_id;
                    $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
                    $run_delete=mysqli_query($con, $delete_query);
                    if($run_delete){
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }
            }

        }

        echo $remove_item= remove_cart_item();
        ?>

    <!--footer-->
        <?php
        include("./includes/footer.php");
        ?>

    </div>
    

<!-- Bootstrap js link-->
<script type="text/javascript" src=".\js\bootstrap.min.js"></script>
</body>
</html>