<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$msg = " ";
$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery') or die("connection error");
$id = $_COOKIE['id'];
$sql = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($sqlconnection, $sql);
$row = mysqli_fetch_assoc($result);
$profile = $row['profile'];

if ($_POST) {
    $name = $_REQUEST['name'];
    $dob = $_REQUEST['dob'];
    $contact = $_REQUEST['number'];
    $pincode = $_REQUEST['pin'];
    $place = $_REQUEST['place'];

    http_response_code(200);
    $update = "UPDATE user SET name = '" . $name . "', dob = '" . $dob . "',pincode = '" . $pincode . "', place = '" . $place . "' WHERE id='".$id."'";
    $result = mysqli_query($sqlconnection, $update) or die("query error");
    $msg = "Record Updated Successfully";
    header('Location: index.php');
    exit(0);
} else{
    http_response_code(400);
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
                <div>
                    <img src="images/icon.png" alt="loading" class="icon">
                </div>
                <div class="add-icon">
                    <img src="<?php echo $profile; ?>" id="dpicon" class="dp">
                </div>
            </div>

            <div class="edit-body">
                <h1>Edit Details</h1>
                <p><?php echo $msg; ?></p>
                <form method="post" id="edit">
                    <label for="name">Name</label><br>
                    <input type="text" name="name" class="loginput" value="<?php echo $row['name']; ?>" required><br>
                    <label for="dob">DOB</label><br>
                    <input type="date" name="dob" id="" value="<?php echo $row['dob']; ?>" required><br><br>
                    <label for="number">Number</label><br>
                    <input type="number" name="number" class="loginput" value="<?php echo $row['contact']; ?>" required><br>
                    <label for="pin">Pin code</label><br>
                    <input type="number" name="pin" class="loginput" value="<?php echo $row['pincode']; ?>" required><br>
                    <label for="place">Place</label><br>
                    <input type="text" name="place" class="loginput" value="<?php echo $row['place']; ?>" required><br>
                    <input type="submit" value="SUBMIT" class="logbtn"><br><br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>