<?php

if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    $delete_query = "DELETE FROM `categories` WHERE category_id=$delete_category";
    $result = mysqli_query($con, $delete_query);
    if($result){
        echo "<p>Category Has Been Deleted Successfully.</p>";
        echo "<script> window.open('./index.php?view_categories', '_self')</script>";
    }
}

?>