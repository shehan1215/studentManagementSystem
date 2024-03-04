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

    if($_GET['teacher_id']){
        $t_id = $_GET['teacher_id'];
        $sql = "SELECT * FROM teacher WHERE id='$t_id'";
        $result = mysqli_query($data,$sql);
        $info = $result->fetch_assoc();
    }

    if(isset($_POST['teacher_update'])){
        $t_name=$_POST['name'];
        $t_des=$_POST['description'];
        
        $file=$_FILES['image']['name'];
        $dst="./uploadImage/".$file;
        $dst_db="uploadImage/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        $t_id=$_GET['teacher_id'];

        if($file){
            $sql2 = "UPDATE teacher SET name='$t_name', description='$t_des', image='$dst_db' WHERE 
            id='$t_id' ";
        }else{
            $sql2 = "UPDATE teacher SET name='$t_name', description='$t_des' WHERE id='$t_id' ";
        }

        $result2=mysqli_query($data,$sql2);

        if($result2){
            header("location:view_teacher.php");
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
        label{
            display: inline-block;
            width: 150px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .form_deg{
            background-color: skyblue;
            width: 600px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

</head>
<body>
<?php
        include 'admin_sidebar.php';
    ?>
    <div class="content">
    <center>
            <h1>Update Teacher</h1>
            <form action="#" method="POST" class="form_deg" enctype="multipart/form-data">
                <div>
                    <label for="">Teacher Name</label>
                    <input type="text" name="name" value="<?php
                    echo "{$info['name']}" ?>">
                </div>
                <div>
                    <label for="">Teacher Description</label>
                    <textarea name="description" cols="30" rows="10">
                    <?php
                    echo "{$info['description']}" ?>
                    </textarea>
                </div>
                <div>
                    <label for="">Previous Photo</label>
                    <img width="200px" height="200px" src="<?php
                    echo "{$info['image']}" ?>" alt="">
                </div>
                <div>
                    <label for="">New Photo</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <input type="submit" name="teacher_update" class="btn btn-success">
                </div>
            </form>
        </center>

    </div>
</body>
</html>