<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    
    <?php
        include 'admin_css.php';
    ?>

    <style>
        .body{
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .body img{
            width: 50vh;
            margin-right: 2%;
            float:left;
        }
        h1{
            text-align: center;
            font-weight: bold;
        }
        p{
            color: #424a5b;
        }
    </style>
</head>
<body>
    <?php
        include 'admin_sidebar.php';
    ?>
    <div class="content">
        <h1>Admin Pannel Site</h1>
        <div class="body" >
            <img src="Images/AdminBg.jpg">
            <p>Welcome To The Scool Admin Section 
                <br> You can control the all student's data through this system.
                <br><br>Find out more
                <a href="">Click Me.</a>
            </p>
        </div>
    </div>
</body>
</html>