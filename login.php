<?php
$msg = " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST["username"];
   $password = md5($_POST["password"]);

   if (!empty($_POST)) {
      if ((isset($username) && $username) &&
         (isset($password) && $password)
      ) {
         $sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery');
         $sql = "SELECT username, id  FROM  user WHERE username LIKE '$username' AND password = '$password'";
         $result = mysqli_query($sqlconnection, $sql);
         $row = mysqli_fetch_object($result);

         if (!$row) {
            http_response_code(400);
            $msg = "Invalid username or password!";
         } else {
            $id =  $row->id;
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("id", $id, time() + (86400 * 30), "/");
            http_response_code(200);
            echo $error = "Successfully logined!";
            header('Location:index.php');
            exit(0);
         }
      }
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
      <div class="body-panel">
         <div class="form-body">
            <h1>Log In</h1>
            <form action="login.php" method="post" id="loginForm">
               <label for="username">Username</label><br>
               <input type="text" name="username"  class="loginput" required><br>
               <label for="password">Password</label><br>
               <input type="password" name="password"  class="loginput" required><br><br>
               <input type="submit" value="login" class="logbtn"><br><br><br>
               <a href="register.php">Create an account</a>
               <p><?php echo $msg; ?></p>
            </form>
         </div>
      </div>
   </div>
</body>

</html>