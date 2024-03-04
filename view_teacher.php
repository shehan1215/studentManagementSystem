<?php
    session_start();
    error_reporting(0);

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

    $sql = "SELECT * FROM teacher";
    $result = mysqli_query($data,$sql);

    if($_GET['teacher_id']){
        $t_id = $_GET['teacher_id'];
        $sql2 = "DELETE FROM teacher WHERE id='$t_id'";
        $result2 = mysqli_query($data,$sql2);

        if($result2){
            header('location:view_teacher.php');
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
        .table_th{
            padding: 20px;
            
        }
        .table_td{
            padding: 5px;
            font-size: 15px;
        }
        body{
            height: 100vh;
            background-image: linear-gradient(180deg, #b3edef, #337ab769, #f0ad4e);
            background-size: cover;
        }
        h1{
            color: #8a6d3b;
        }
    </style>
</head>
<body>   
<?php
        include 'admin_sidebar.php';
    ?>        
        <div class="content">
        <center>
            <h1>View All Teacher Data</h1>
            <br><br>
            <table>
                <tr>
                    <th class="table_th">Teacher Name</th>
                    <th class="table_th">Subject</th>
                    <th class="table_th">Image</th>
                    <th class="table_th">Remove</th>
                    <th class="table_th">Update</th>
                </tr>
                <?php  
                    while($info=$result->fetch_assoc()){
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['name']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['description']}"; ?></td>
                    <td class="table_td"><img width="100px" height="100px" src="<?php echo "{$info['image']}"; ?>"></td>
                    <td class="table_td">
                        <?php 
                        echo " 
                        <a onClick=\"javascript:return confirm('Are You Sure ?');\" class='btn btn-danger' href='view_teacher.php?teacher_id={$info['id']}'>
                            Remove
                        </a>";
                        ?>                    
                    </td>
                    <td class="table_td">
                    <?php echo "
                        <a href='update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>
                            Update
                        </a>";
                        ?>
                    </td>
                </tr>
                <?php
                    }
                ?>          
            </table>
            </center>
       </div>
</body>

</html>