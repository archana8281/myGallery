<?Php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_COOKIE['id'];
$user = $_COOKIE['username'];
$uid = rand(10, 100);
$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery') or die("connection error");
if ($_FILES) {

  $ext = strtolower(pathinfo($_FILES["addNew"]["name"], PATHINFO_EXTENSION));
  //  image upload
  if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
    $targetFile1 = "upload/add/" . $user . "." . $uid . "." . $ext;

    if (move_uploaded_file($_FILES["addNew"]["tmp_name"], $targetFile1)) {
      $sql = "INSERT INTO media(type, path, Uid)  VALUES('image','$targetFile1','$id')";
      $result = mysqli_query($sqlconnection, $sql);
      $targetFile1 . "?" . rand(1000, 10000);
      echo "uploaded successfully..";
    } else {
      echo "something went wrong!";
    }
  }

  //  video upload
  elseif (in_array($ext, ['mp4', 'avi', 'mov'])) {
    $targetFile2 = "upload/add/" . $user . "." . $uid . "." . $ext;

    if (move_uploaded_file($_FILES["addNew"]["tmp_name"], $targetFile2)) {
      $sql = "INSERT INTO media(type, path, Uid)  VALUES('video','$targetFile2','$id')";
      $result = mysqli_query($sqlconnection, $sql);
      $targetFile2 . "?" . rand(1000, 10000);
      echo "uploaded successfully..";
    } else {
      echo "something went wrong!";
    }
  }
}
