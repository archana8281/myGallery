<?php
$value = $_GET['val'];
$id = $_COOKIE['id'];
$user = $_COOKIE['username'];
$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery');

switch ($value) {
    case 'img':
        $sql = "SELECT * FROM media WHERE type = 'image' AND Uid = '$id'";
        break;
    case 'vid':
        $sql = "SELECT * FROM media WHERE type = 'video' AND Uid = '$id'";
        break;
    default:
        $sql = "SELECT * FROM media WHERE  Uid = '$id'";
        break;
}

$result = mysqli_query($sqlconnection, $sql);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
foreach ($rows as $row) {
    if (!empty($row['type']) && $row['type'] === 'image') {

        echo '<div class="column"> <img src="' . $row['path'] . '" alt="loading" style="height: 200px; width:200px;" onclick="myFunction(this,\'img\');" id="img"> 
        <div class="Dsection">
        <a href="delete.php?id=' . $row['id'] . '" class="deletebtn">Delete</a>
     </div>

        </div>';
    }

    if (!empty($row['type']) && $row['type'] === 'video') {
        echo '<div class="column"> <video src="' . $row['path'] . '" style="height: 300px; width:200px;" onclick="myFunction(this,\'vid\');"></video> 
        <div class="Dsection">
        <a href="delete.php?id=' . $row['id'] . '" class="deletebtn">Delete</a>
     </div>

        </div>';
    }
}
