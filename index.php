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

$sql = "SELECT * FROM teacher LIMIT 5";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</head>

<body>
    <nav>
        <label class="logo"><img src="Images/logo1.png" alt="" width="90px" height="auto"></label>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#admission_form">Admission</a></li>
            <li><a href="">About</a></li>
            <li><a href="login.php" class="btn btn-info" target="_blank">Login</a></li>
        </ul>
    </nav>

    <div class="section1" id="home">
        <img class="main_img" src="Images/bg.png" alt="SchoolManagementImage">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="Images/book.jpg" alt="schoolImages" class="welcome_img">
            </div>
            <div class="col-md-8">
                <h1 style=" color: #974900; font-weight: bold;">Welcome!</h1>
                <p>Welcome to our advanced School Management System, a comprehensive web-based solution designed to
                    enhance efficiency and streamline various administrative and academic processes within educational
                    institutions. Our platform is tailored to meet the diverse needs of schools, colleges, and
                    universities, providing for seamless management of day-to-day operations.</p>
                <button type="button" class="help btn btn-info"><a href="help.php">Help Me  
                <box-icon name='chevron-right' animation='fade-left' color='#ebf5f5' style="padding-top:10px;font-size:15px; font-weight:bold;"></box-icon></a></button>
            </div>
        </div>
    </div>

    <center>
        <h1 style=" color: #974900; font-weight: bold;">Our Teachers</h1>
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
            <a href="teacher_info_page.php" class="btn btn-info" style="margin-top:70px; margin-left:40px;">
                Click Here - -></a>
        </div>
    </div>

    <center>
        <h1 style=" color: #974900; font-weight: bold;">Our Courses</h1>
    </center>
    <div class="container" id="courses">
        <div class="row">
            <div class="col-md-4">
                <img src="Images/webdeveloping.jpg" alt="web" class="teacher">
                <h3>Web Developing</h3>
            </div>
            <div class="col-md-4">
                <img src="Images/marketing.jpg" alt="Marketing" class="teacher">
                <h3>Marketing Maagement</h3>
            </div>
            <div class="col-md-4">
                <img src="Images/management.jpg" alt="Management" class="teacher">
                <h3>Management Diploma</h3>
            </div>
        </div>
    </div>

    <center>
        <h1 class="adm" style=" color: #974900; font-weight: bold;" id="admission_form">Admission Form</h1>
    </center>
    <div align="center" class="admission_form" >
        <form action="data_check.php" method="POST">
            <div class="adm_int">               
                <input class="input_deg" type="text" name="name" placeholder="Name">
            </div>
            <div class="adm_int">                
                <input class="input_deg" type="text" name="email" placeholder="E-mail">
            </div>
            <div class="adm_int">               
                <input class="input_deg" type="text" name="phone" placeholder="Phone">
            </div>
            <div class="adm_int">            
                <textarea class="input_txt" name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-info" id="submit" type="submit" value="Apply" name="apply">
            </div>
        </form>
    </div>
    <br><br>
    <?php
        include "footer.php";
    ?>
</body>

</html>