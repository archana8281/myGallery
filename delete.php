<?php
$Uid = $_GET['Uid'];
$user = $_COOKIE['username'];
if (!$Uid) {
    echo  "operation failed";
} else {
     $sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery');
    $sql = "DELETE FROM $user  WHERE Uid = $Uid";
    $result = mysqli_query($sqlconnection, $sql) or die("query error");
    header('Location: index.php');
}