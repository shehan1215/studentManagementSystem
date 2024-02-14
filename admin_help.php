<?php
    include 'admin_sidebar.php';
    include "admin_css.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Help</title>
    <style>
        .main_topic{
            text-decoration: underline;
            background-color: yellow;
            width: 18%;
            padding: 4px;
        }
        .section{
            padding-left: 25%;
        }
        span{
            color: red;
            font-weight: bold; 
        }
        .logout{
            margin-top: 18px;
        }
    </style>
</head>
<body>
    <center>
        <h1 class="main_topic">Guidelines</h1>
        <br><br>
    </center> 
    <div class="section">
        <h2>1. <br> Handle the Students</h2>
            <p>Firstly reffer about the what are the Admissions by click in Admission section.<br>
            You can add the students according to the admissions. Therefore,<br>
            you can access the Add Student section and fill the form according the submited admissions. <br>
            After that you can give any password and username for students and those information send back
            via the student email.<br> So students can change their password but username cannot change. <br>
            As an Admin you have to provide valuable user name.</p>
        <p>
            <span>* </span>You can control all the student's data using the section of Student Data. <br>
            Therefore, You can remove or update the student's data through that section.
        </p>
    </div>
    <br><br>
    <div class="section">
        <h2>2. <br> Handle the Teachers</h2>
        <p>
            You can add the teachers by get their details. Therefore,<br>
            you can access the Add teacher section and fill the form and upload the clear photo. <br>
            After that you can press the button to end the process.change.</p>
        <p>
            <span>* </span>You can control all the teachers's data using the section of Teacher Data. <br>
            And also you can see all the teachers in that section.
        </p>
    </div>
    <br><br>
    <div class="section">
        <h2>3. <br> Handle the Courses</h2>
        <p>
            Firstly you have to discuss with your teachers and add the courses according to their knowledge. <br>
            So before add the courses solve out about the courses and who can teach that course. <br>
            You can handle all the course details. <br>
            If you want to know about the courses informations using the section of Course Data.</p>
        <p>
            <span>* </span>All the course details are should be visible to the students before they enroll
            any course. 
        </p>
    </div>
</body>
</html>