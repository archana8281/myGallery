<?php
$value = $_GET['val'];
$user = $_COOKIE['username'];
$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery');

switch ($value) {
    case 'img':
        $sql ="SELECT `image`,`Uid` FROM $user"; 
        break;
    case 'vid':
            $sql ="SELECT `video`,`Uid` FROM $user"; 
            break;  
     default:
        $sql = "SELECT * FROM $user";  
        break;      

}

$result = mysqli_query($sqlconnection, $sql);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

foreach ($rows as $row) {
    if (!empty($row['image'])) {
        echo '<div class="column"> <img src="' . $row['image'] . '" alt="loading" style="height: 200px; width:200px;" onclick="myFunction(this,\'img\');" id="img"> 
        <div class="Dsection">
        <a href=delete.php?Uid='.$row['Uid'].' class="deletebtn">Delete</a>
     </div>

        </div>';
    }
    
    if (!empty($row['video'])) {
        echo '<div class="column"> <video src="' . $row['video'] . '" style="height: 300px; width:200px;" onclick="myFunction(this,\'vid\');"></video> 
        <div class="Dsection">
        <a href=delete.php?Uid='.$row['Uid'].' class="deletebtn">Delete</a>
     </div>

        </div>';
    }
}
?>
