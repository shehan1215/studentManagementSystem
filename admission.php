<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "school";
$data = mysqli_connect($host,$user,$password,$db);

$sql = "SELECT * FROM admission";
$result = mysqli_query($data,$sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission dashboard</title>
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
            <h1>Applied Admission</h1>
            <br><br>
            <table border="1px">
                <tr>
                    <th style="padding:20px; font-size:15px";>Full Name</th>
                    <th style="padding:20px; font-size:15px";>Email</th>
                    <th style="padding:20px; font-size:15px";>Phone</th>
                    <th style="padding:20px; font-size:15px";>Message</th>
                </tr>
                <?php
                    while($infoToGetI=$result->fetch_assoc()){

                ?>
                <tr>
                    <td style="padding:20px;"><?php 
                        echo "{$infoToGetI['name']}";
                        ?></td>
                        <td style="padding:20px;"><?php 
                            echo "{$infoToGetI['email']}";
                        ?></td>
                        <td style="padding:20px;"><?php 
                            echo "{$infoToGetI['phone']}";
                        ?></td>
                        <td style="padding:20px;"><?php 
                            echo "{$infoToGetI['message']}";
                        ?></td>
                </tr>
                    <?php
                        }
                            
                    ?>
            </table>
        </center>
    </div>
</body>
</html>