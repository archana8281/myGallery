<?php
$Mid = $_GET['id'];
$user = $_COOKIE['username'];
if (!$Mid) {
    echo  "operation failed";
} else {
    $sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery');
    $sql = "DELETE FROM media  WHERE id = $Mid";
    $result = mysqli_query($sqlconnection, $sql) or die("query error");
    header('Location: index.php');
}
