<?php
error_reporting(0);
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

$sql = "SELECT * FROM user WHERE usertype='student'";
$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>

    <style>
        .table_th{
            padding: 15px; 
        }
        .table_td{
            padding: 10px;
            font-size: 15px;
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
        <h1>All the Students</h1>
        <?php
        if($_SESSION['message']){
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>

        <br><br>
        <table>
            <tr>
                <th class="table_th">User Name</th>
                <th class="table_th">Phone</th>
                <th class="table_th">Email</th>
                <th class="table_th">Password</th>
                <th class="table_th">Remove</th>
                <th class="table_th">Update</th>
            </tr>
            <?php
                while($info=$result->fetch_assoc()){
            ?>
            <tr>
                <td class="table_td">
                    <?php echo "{$info['username']}" ?>
                </td>
                <td class="table_td">
                <?php echo "{$info['phone']}" ?>
                </td>
                <td class="table_td">
                <?php echo "{$info['email']}" ?>
                </td>
                <td class="table_td">
                <?php echo "{$info['password']}" ?>
                </td>
                <td class="table_td">
                <?php echo "<a onclick=\"javascript:return confirm('Are You Sure?');\" 
                class='btn btn-danger' href='delete.php?student_id={$info['id']}'>Remove</a>" ?>
                </td>
                <td class="table_td">
                <?php echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>"; ?>
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