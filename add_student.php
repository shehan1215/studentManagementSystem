<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}
?>

<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "school";
    $data = mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student'])){
        $username = $_POST['name'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $user_password = $_POST['password'];
        $usertype = "student";

        $check = "SELECT * FROM user WHERE username='$username'";
        $check_user = mysqli_query($data,$check);
        $row_count = mysqli_num_rows($check_user);

        if($row_count==1){
            echo "<script type='text/javascript'>
            alert('Username is already exist');
            </script>";
        }else{

            $sql = "INSERT INTO user(username,phone,email,usertype,password) VALUES ('$username','$user_phone','$user_email',
            '$usertype','$user_password')";

            $result=mysqli_query($data,$sql);

            if($result){
                echo "<script type='text/javascript'>
                alert('Data Upload Successfully');
                </script>";
            }else{
                echo "<script type='text/javascript'>
                alert('Data Upload Failed');
                </script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style type="text/css">
        .box-icon{
            display: inline-block;
            margin-right: 10px;
        }
        .div_deg{
            background-color: #87ceeb61;
            width: 450px;
            padding-top: 70px;
            padding-bottom: 70px;
            border-radius: 10px;
            box-shadow: 0rem 1rem 1rem 3px rgba(50, 50, 50, 0.582);
        }
        .div_deg input{
            width: 50%;
            padding: 5px;
            margin: 10px;
            border-radius: 10px;
            border: none;
        }
        .div_deg .btn{
            width: 23%;
            padding: 8px;
            border-radius: 5px;
        }
    </style>
    
    <?php
        include 'admin_css.php';
    ?>

</head>

<body>
<?php
        include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1>Student Registration</h1>
        <br>
        <div class="div_deg">
            <form action="#" method="POST">
                <div>
                    <box-icon class="box-icon" name='user' color='rgba(0,0,0,0.45)'></box-icon>
                    <input type="text" name="name" placeholder="User Name ">
                </div>
                <div>
                    <box-icon class="box-icon" name='envelope' color='rgba(0,0,0,0.45)'></box-icon>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div>
                    <box-icon class="box-icon" name='phone' color='rgba(0,0,0,0.45)'></box-icon>
                    <input type="number" name="phone" placeholder="Phone Number">
                </div>
                <div>
                <box-icon class="box-icon" name='lock-alt' color='rgba(0,0,0,0.45)' ></box-icon>
                    <input type="text" name="password" placeholder="Password">
                </div>
                <br>
                <div>
                    <input type="submit" name="add_student" value="Add Student" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>

</html>