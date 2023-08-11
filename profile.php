<?Php
$id = $_COOKIE['id'];
$user = $_COOKIE['username'];
$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery');

$ext = strtolower(pathinfo($_FILES["dp-upload"]["name"], PATHINFO_EXTENSION));
$targetFile =  "upload/profile/" .$id. "." .$user. ".". $ext;
// print_r($fetch);
if ($_FILES) {

  if (move_uploaded_file($_FILES["dp-upload"]["tmp_name"], $targetFile)) {
    $sql = "UPDATE user SET profile = '$targetFile' WHERE id = '$id'";
    $result = mysqli_query($sqlconnection, $sql) or die("error");
     $targetFile . "?" . rand(1000, 10000);
    //  echo "Profile uploaded successfully..";
  } else{
    // echo "Connection error !";
  }
}
?>