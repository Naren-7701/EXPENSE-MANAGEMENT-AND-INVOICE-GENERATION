<?php
    require "connection.php";
    if(isset($_POST['submit']))
    {
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="INSERT INTO `register`(`firstname`,`lastname`,`email`,`passwd`) VALUES ('$fname','$lname','$email','$password');";
        try
        {
            if(mysqli_query($conn,$sql))
            {
                echo "<script>alert('Registration Successful')</script>";
                echo '<script> window.location="login.php";</script>';
            }
        }
        catch(Exception $e)
        {
            echo "<h1>Something went wrong.Please try again.</h1>";
        }
    }
?>
<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registration</title>
        <link href="cssstyle.css" rel="stylesheet">
    </head>
    <body class="bg">
        <div class="container">
            <div class="shadow">
            <div class="row">
                <div class="img-need bg-image"></div>
                <div class="col">
                <div class="padd">
                <div class="text-center">
                    <h1 class="h4">Create an Account</h1>
                </div>
                <form method="post" action="register.php">
                    <div><input type="text" name="firstname" placeholder="First Name"></div><br>
                    <div><input type="text" name="lastname" placeholder="Last Name"><br></div><br>
                    <div><input type="email" name="email" placeholder="Email Address"></div><br>
                    <div><input type="password" name="password" placeholder="Password"></div><br>
                    <input type="submit" name="submit" class="btn btn-primary" value="Register Account">
                </form>
                <hr>
                <div class="text-center"><a href="forgot-password.html"><h4>FORGOT PASSWORD</h4></a></div>
                <div class="text-center"><a href="login.php"><h4>ALREADY HAVE AN ACCOUNT, LOGIN</h4></a></div>
            </div>
        </div>
    </body>
</html>