<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location:login.php");
    } elseif ($_SESSION['usertype'] == 'student') {
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "school";
    $data = mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_teacher'])){
        $t_name = $_POST['name'];
        $t_description = $_POST['description'];
        $t_image = $_FILES['image']['name'];

        $file = $_FILES['image']['name'];
        $dst = "./uploadImage/".$file;
        $dst_db = "uploadImage/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $sql = "INSERT INTO teacher (name,description,image) VALUES ('$t_name','$t_description','$dst_db')";
        $result=mysqli_query($data,$sql);

        if($result){
            header('location:add_teacher.php');
        }
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
        .div_deg{
            background-color: #87ceeb61;
            width: 500px;
            padding-top: 40px;
            padding-bottom: 26px;
            box-shadow: 0rem 1rem 1rem 3px rgba(50, 50, 50, 0.582);
        }
        .all_inputs{
            text-align: left;
            padding: 5px;
            margin: 5px;
            width: 300px;
        }
    </style>
</head>

<body>

<?php
        include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1>Teacher Registration</h1>
        <br><br>
        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div> 
                    <input class="all_inputs" type="text" name="name" placeholder="Name">
                </div>
                <div>
                    <textarea class="all_inputs" name="description" id="" cols="30" rows="5" placeholder="Subjects"></textarea>
                </div>
                <br>
                <div>
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" style="color:#484848;">
                </div>
                <br><br>
                <div>
                    <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary">
                </div>
            </form>
        </div>
        </center>
    </div>

</body>

</html>