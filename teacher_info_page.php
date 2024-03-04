<?php
error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'> alert('$message');</script>";
}

$host = "localhost";
$user = "root";
$password = "";
$db = "school";
$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Informations</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <style>
        .navbar{
            border-radius: 0px;
            padding-left: 5%;
        }
        body{
            /* background-image: linear-gradient(#fff7ea, #ffe6c4); */
            background-image: url(Images/teacherInfo.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php" style="color:white;">
    <img src="Images/home.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Go Home
  </a>
</nav>
    <center>
        <h1 style=" color: #974900; font-weight: bold; margin-top: 45px;">Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">
            <?php
                while ($info = $result->fetch_assoc()) { 
                ?>
                <div class="col-md-4">
                    <img class="teacher" src="<?php echo "{$info['image']}" ?>">
                    <h3>
                        <?php echo "{$info['name']}"; ?>
                    </h3>
                    <h5>
                        <p style="padding-bottom: 15px;">(<?php echo "{$info['description']}"; ?>)</p>
                    </h5>                
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>