<?php

if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    //fetching category id
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];

       //fetching brand id
       $select_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
       $result_brand = mysqli_query($con, $select_brand);
       $row_brand = mysqli_fetch_assoc($result_brand);
       $brand_title = $row_brand['brand_title'];  
}


?>


<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-title" class="form-label">Product Title: </label>
            <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title; ?>" >
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-description" class="form-label">Product Description: </label>
            <input type="text" id="product_description" name="product_description" class="form-control" value="<?php echo $product_description; ?>" >
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-keywords" class="form-label">Product Keywords: </label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control"  value="<?php echo $product_keywords; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product-keywords" class="form-label">Product Category: </label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title; ?>"><?php echo $category_title; ?></option>
                <?php
                    //fetching category id
                    $select_category_all = "SELECT * FROM `categories`";
                    $result_category_all = mysqli_query($con, $select_category_all);
                    while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                        $category_title = $row_category_all['category_title'];
                        $category_id = $row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product-keywords" class="form-label">Product Brand: </label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_title; ?>"><?php echo $brand_title; ?></option>
                <?php
                    //fetching category id
                    $select_brand_all = "SELECT * FROM `brands`";
                    $result_brand_all = mysqli_query($con, $select_brand_all);
                    while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
                        $brand_title = $row_brand_all['brand_title'];
                        $brand_id = $row_brand_all['brand_id'];
                        echo "<option value='$brands_id'>$brand_title</option>";
                    };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-image1" class="form-label">Product Image 1: </label>
            <div class="d-flex">
                <input type="file"  id="product_image1" name="product_image1" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image1 ?>" alt="image 1" class="product-img">    
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-image2" class="form-label">Product Image 2: </label>
            <div class="d-flex">
                <input type="file"  id="product_image2" name="product_image2" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="image 2" class="product-img">    
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-image3" class="form-label">Product Image 3: </label>
            <div class="d-flex">
                <input type="file"  id="product_image3" name="product_image3" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image3 ?>" alt="image 3" class="product-img">    
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product-price" class="form-label">Product Price: </label>
            <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $product_price; ?>">
        </div>
        <div class="w-50">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category= $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking for fields empty or not
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<p>Please Fill all the Fields</p>";
    } else {
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        $update_product = "UPDATE `products` SET product_title='$product_title', product_description='$product_description', product_keywords='$product_keywords', category_id='$product_category', brand_id='$product_brands',
        product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price='$product_price' WHERE product_id=$edit_id";        
        $result_update = mysqli_query($con, $update_product);
        if($result_update){
            echo "<p>Product Updated Successfully.</p>";
            echo "<script> window.open('./insert_product.php', '_self')</script>";
        }
    }
} else {
    echo "<p>There is an error.</p>";
}; 

?>
