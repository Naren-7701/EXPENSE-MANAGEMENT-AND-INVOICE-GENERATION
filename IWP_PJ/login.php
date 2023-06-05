<?php
    require "connection.php";
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT * FROM register WHERE email='".$email."' AND passwd='".$password."'";  
        $result=mysqli_query($conn,$sql);
        $numrows=mysqli_num_rows($result);  
        if($numrows!=0)  
        {  
            while($row=mysqli_fetch_assoc($result))  
            {  
                $dbemail=$row['email'];  
                $dbpass=$row['passwd'];  
            }  
            if($email==$dbemail && $password == $dbpass)  
            {  
                session_start();  
                $_SESSION['sess_user']=$email;  
                /* Redirect browser */  
                header("Location: index.php");  
            }  
        } 
        else 
        {  
            echo "<script>alert('User Not Found,Enter the Valid Credentials')</script>";  
        }  
    } 
?>
<DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="cssstyle.css" rel="stylesheet">
</head>
<body class="bg">
    <div class="container">
        <div class="shadow">
        <div class="row">
            <div class="img-need bg-image"></div>
            <div class="col text-center">
                <h2><p>EXPENSE MANAGEMENT AND INVOICE GENERATION</h2><br><h3>Manage Projects with Ease</h3></p>
                <p>An Online Website to track Expenses, Generate Invoice</p>
                <div class="padd">
                    <form class="user" action="login.php" method="post">
                        <div><input type="email" name="email" placeholder="Enter Email"></div><br>
                        <div><input type="password" name="password" placeholder="Enter Password"></div><br>
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    </form>
                    <hr>
                    <div class="text-center"><a href="forgot-password.html"><h4>FORGOT PASSWORD</h4></a></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>
</html>