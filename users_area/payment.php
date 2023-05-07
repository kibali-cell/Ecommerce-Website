<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Bootstrap css link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesome link-->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }

        .payment_image{
            width:90%;
            margin: auto;
            display:block;
        }
    </style>
</head>
<body>
    <?php
    
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];

    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify_content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank" ><img src="../images/cover.jpg" alt="" class="payment_image"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id; ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
<!-- Bootstrap js link-->
<script type="text/javascript" src="..\js\bootstrap.min.js"></script>
</body>
</html>