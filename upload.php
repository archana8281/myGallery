<?Php
$id = $_COOKIE['id'];
$user = $_COOKIE['username'];
$uid = rand(10, 100);
$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery');

if ($_FILES) {

  $ext = strtolower(pathinfo($_FILES["addNew"]["name"], PATHINFO_EXTENSION));
 // Handle image upload
  if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
    $targetFile1 = "upload/" . $user . "." . $uid . "." . $ext;

    if (move_uploaded_file($_FILES["addNew"]["tmp_name"], $targetFile1)) {
      $sql = "INSERT INTO $user(Uid, image)  VALUES('$uid', '$targetFile1')";
      $result = mysqli_query($sqlconnection, $sql);
      $targetFile1 . "?" . rand(1000, 10000);
      echo "uploaded successfully..";
    } else {
      echo "something went wrong!";
    }
  }

  // Handle video upload
  elseif (in_array($ext, ['mp4', 'avi', 'mov'])) {
    $targetFile2 = "upload/" . $user . "." . $uid . "." . $ext;

    if (move_uploaded_file($_FILES["addNew"]["tmp_name"], $targetFile2)) {
      $sql = "INSERT INTO $user(Uid, video)  VALUES('$uid', '$targetFile2')";
      $result = mysqli_query($sqlconnection, $sql);
      $targetFile2 . "?" . rand(1000, 10000);
      echo "uploaded successfully..";
    } else {
      echo "something went wrong!";
    }
  }
}
