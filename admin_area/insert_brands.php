<?php
include('../includes/connect.php');

if(isset($_POST['insert_brands'])){
    $brand_title=$_POST['brand_title'];

    //select data from db
    $select_query="select * from `brands` where brand_title ='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number= mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Brand Exists in Database')</script>";
    } else {
        $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
        $result=mysqli_query($con, $insert_query);
    if($result){
        echo "<script>alert('Brand has been inserted successfully')</script>";
    } else {
        echo "<script>alert('Brand has not been inserted!')</script>";
    }
}}

?>

<h2 class="text-center">Insert Brands.</h2>


<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" name="brand_title" placeholder="Insert Brands" class="form-control" aria-label="brands" aria-describedby="basic-addon1">  
    </div>
    <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" name="insert_brands" value="Insert Brands" class="bg-info border-0 p-2 my-3"> 
       
    </div>
</form>