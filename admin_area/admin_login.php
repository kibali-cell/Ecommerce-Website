<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/burger.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Enter Username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" name="admin-login" value="Login" class="bg-info py-2 px-3 border-0">
                        <p class="small mt-2 pt-1">Don't have an account? <a href="admin_login.php" class="link-danger">Register</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>