<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
<body class="body_deg" background="">
    <center>
        <div class="form_deg">
            <center class="tittle_deg">
                -- L O G I N --
                <h4>
                    <?php
                    error_reporting(0);
                    session_start();
                    session_destroy();
                    echo $_SESSION["loginMessage"];
                    ?>
                </h4>
            </center>
        <center>
            <form action="login_check.php" method="POST" class="login_form">
                <div >
                    <label class="label_deg"><box-icon name='user' animation='flashing' size='lg'></box-icon></label>
                    <input type="text" name="username" placeholder="Username" class="userInput">
                </div>
                <div>
                    <label class="label_deg"><box-icon name='lock-open' animation='flashing' size='lg'></box-icon></label>
                    <input type="password" name="password" placeholder="Password" class="userInput">
                </div>
                <br>
                <div class="button">
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                    <a class="btn btn-danger" href="index.php">Cancel</a>
                </div>
            </form>
        </div>
    </center>
</body>
</html>


