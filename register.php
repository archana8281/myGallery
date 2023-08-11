<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$msg = "";
$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery') or die("connection error");
if ($_POST) {
    $username = $_POST['username'];
    $Cpassword = md5($_POST['Cpassword']);
    $contact = $_POST['number'];
    $gender = $_POST['gender'];
    if (!empty($_POST) && $_POST['password'] === $_POST['Cpassword']) {
        $sql = "SELECT username FROM  user WHERE username = '$username'";
        $result =  mysqli_query($sqlconnection, $sql) or die("query error");
        $row = mysqli_fetch_object($result);

        if (!$row) {
            http_response_code(200);
            $insert = "INSERT INTO user (username, password, contact, gender) VALUES('" . $username . "','" . $Cpassword . "','" . $contact . "','" . $gender . "')";
            mysqli_query($sqlconnection, $insert) or die("query error");
            $msg = "Create an account successfully!!";
            header("location: login.php");
            exit;
        } else {
            $msg = "Already have an account";
        }
    } else {
        $msg = "Please type the same password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myGallery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="gallery">
        <div class="container">
            <div class="login-header">
                <img src="images/icon.png" alt="loading" class="icon">
                <div class="user_icon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="form-body">
            <h1>Create an Account</h1>
            <form method="post" id="register">
                <label for="username">Username</label><br>
                <input type="text" name="username" class="loginput" required><br>
                <label for="number">Number</label><br>
                <input type="number" name="number" class="loginput" required><br>
                <label for="gender">Gender</label><br>
                male<input type="radio" value="male" name="gender">
                female<input type="radio" value="female" name="gender">
                custom<input type="radio" value="custom" name="gender"><br><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" class="loginput" required><br>
                <label for="Cpassword">Confirm Password</label><br>
                <input type="password" name="Cpassword" class="loginput" required><br>
                <p><?php echo $msg; ?></p>
                <input type="submit" value="sign in" class="logbtn"><br><br>
            </form>
        </div>
    </div>
</body>

</html>