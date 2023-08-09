<?php
if(!isset($_COOKIE['username'])){
    header('location: login.php');
}else{
    unset($_COOKIE['username']);
    setcookie('username', '', -1, '/');
    unset($_COOKIE['id']);
    setcookie('id', '', -1, '/');
    header('location: login.php');
}
?>