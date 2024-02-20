<?php
session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }elseif($_SESSION['usertype']=='admin'){
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "school";
    $data = mysqli_connect($host,$user,$password,$db);

    $name = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username='$name'";
    $result = mysqli_query($data,$sql);

    $info = mysqli_fetch_assoc($result);

    if(isset($_POST['update_profile'])){
        $s_email = $_POST['email'];
        $s_phone = $_POST['phone'];
        $s_password = $_POST['password'];

        $sql2 = "UPDATE user SET email='$s_email',phone='$s_phone',password='$s_password' WHERE username='$name'";
        $result2 = mysqli_query($data,$sql2);

        if($result2){
            header('location:student_profile.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student dashboard</title>

    <?php
        include 'student_css.php';
    ?>

    <style>
        label{
            display: inline-block;
            text-align: left;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: #8a6d3b30;
            border-radius: 10px;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 40px;
            box-shadow: 1rem 1rem 1rem 3px rgba(50, 50, 50, 0.582);
        }
        h1{
            color: #2e6da4;
        }
        h2{
            color: #002139;
            text-transform: capitalize;
        }
        input{
            background-color: #abfbff94;
            padding: 5px;
            padding-left: 15px;
            border: none;
            border-radius: 10px;
        }
        span{
            color: #001dff;
        }
    </style>
</head>
<body>
    <?php
        include 'student_sidebar.php';
    ?>
    <div class="content">
        <center>
            <br><p><h2>Hi... <?php echo "{$info['username']}"; ?>.</h2><br><span style="font-size:18px; color:black;"> Welcome</span> to the 
                student dashboard <br>and this is your Profile view and you can edit below details. 
                <br>Your personal contact details are,<br> Email: <span><?php echo "{$info['email']}"; ?></span>
                 and your contact No: <span><?php echo "{$info['phone']}"; ?></span>
                <br>Thank you.</p>
            <br><br>
        <form action="#" method="POST">
            <div class="div_deg">
            <div>
                <label for="">Email</label>
                <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" value="<?php echo "{$info['password']}"; ?>">
            </div>
            <br>
            <div>
                <input class="btn btn-primary" type="submit" name="update_profile" value="Update">
            </div>
            </div>
        </form>
        </center>
    </div>
</body>
</html>