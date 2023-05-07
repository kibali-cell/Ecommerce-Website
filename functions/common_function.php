<?php

// include('./includes/connect.php');

function getproducts(){
    global $con;

    //condition to check isset
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){

    $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,9";
                    $result_query = mysqli_query($con, $select_query);
                    
                    while($row= mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keywords=$row['product_keywords'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        echo"    
                        <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'><b>Price:</b> $product_price /=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                    }
}
}
}

//getting all products
function get_all_products() {
    global $con;

    //condition to check isset
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){

    $select_query = "SELECT * FROM `products` ORDER BY rand()";
                    $result_query = mysqli_query($con, $select_query);
                    
                    while($row= mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keywords=$row['product_keywords'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        echo"    
                        <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price /=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                    }
}
}
}

// getting unique categories
function get_unique_categories(){
    global $con;

    //condition to check isset
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];

    $select_query = "SELECT * FROM `products` WHERE category_id = $category_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows= mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger error'>No Stock For This Category.<h2>";
    }
                    
                    while($row= mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keywords=$row['product_keywords'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        echo"    
                        <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price /=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                    }
}
}


// getting unique brands
function get_unique_brands(){
    global $con;

    //condition to check isset
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];

    $select_query = "SELECT * FROM `products` WHERE brand_id = $brand_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows= mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger error'>This Brand is Not Available For Service.<h2>";
    }
                    
                    while($row= mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keywords=$row['product_keywords'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        echo"    
                        <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price /=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                    }
}
}


//displaying brands

function getbrand(){
    global $con;
    $select_brands = "select * from `brands`";
                    $result_brands=mysqli_query($con, $select_brands);
                    
                    while($row_data = mysqli_fetch_assoc($result_brands)){
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo " <li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
                    } 
}

//displaying categories

function getcategories() {
    global $con;
    $select_categories = "select * from `categories`";
    $result_categories=mysqli_query($con, $select_categories);
    
    while($row_data = mysqli_fetch_assoc($result_categories)){
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo " <li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    </li>";
    } 
}

//search products
function search_product() {
    global $con;
    if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
    $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
                    $result_query = mysqli_query($con, $search_query);
                    $num_of_rows= mysqli_num_rows($result_query);
                    if($num_of_rows==0){
                        echo "<h2 class='text-center text-danger error'>No Product Found From The Search!<h2>";
                    }
                    
                    while($row= mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keywords=$row['product_keywords'];
                        $product_image1=$row['product_image1'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        echo"    
                        <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price /=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                    }
}
}

//view details function

function viewDetails(){
    global $con;

    //condition to check isset
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
            $product_id=$_GET['product_id'];
    $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
                    $result_query = mysqli_query($con, $select_query);
                    
                    while($row= mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_description'];
                        $product_keywords=$row['product_keywords'];
                        $product_image1=$row['product_image1'];
                        $product_image2=$row['product_image2'];
                        $product_image3=$row['product_image3'];
                        $product_price=$row['product_price'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        echo"    
                        <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' alt='$product_title' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price: $product_price /=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='index.php' class='btn btn-secondary'>Go Home</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-md-8'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-5'>Related Products</h4>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image2' alt='$product_title' class='card-img-top'>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image3' alt='$product_title' class='card-img-top'>
                        </div>
                    </div>
                </div>
                    
                    ";
                    }
}
}
    }
}

//get ip address function
function getIPAddress(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address' AND product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This Item Already Exists in Cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            $insert_query="INSERT INTO  `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$get_ip_address', 0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('This Item is Added To Cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}

//function for cart item number
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_address = getIPAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
}

function total_cart_price() {
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while($row=mysqli_fetch_array($result)){
        $qty=$row['quantity'];
        $product_id = $row['product_id'];
        $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);   

        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
        }
    }
    echo $total_price;
}

//get user order details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'] ?? '';
    $get_details = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a><p>";
                    } else {
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have no pending orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a><p>";
                    }
                }
            }
        }
    } 
}
?>