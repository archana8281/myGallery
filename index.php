<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sqlconnection = mysqli_connect('localhost', 'root', '', 'mygallery')or die("connection error");
$id = $_COOKIE['id'];
$user = $_COOKIE['username'];
$select = "SELECT `profile` FROM `user` WHERE id=$id";
$result = mysqli_query($sqlconnection, $select);
$selectdp = mysqli_fetch_assoc($result) or die("query error");
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
         <div class="header">
            <div>
               <img src="images/icon.png" alt="loading" class="icon">
            </div>
            <div>
               <form id="uploadData" action="upload.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="addNew" id="addNew" accept="image/*" style="display: none;">
                  <input type="file" name="addvid" id="addvid" accept="video/*" style="display: none;">
                  <i class="fa fa-plus" aria-hidden="true" id="add"></i>
               </form>
            </div>
            <div class="add-icon">
               <img src="<?php echo $selectdp['profile']; ?>" id="dpicon" class="dp">
            </div>
         </div>
         <p id="msg"></p>
         <div class="view-panel">
            <div class="profile">
               <h3>Profile</h3>
               <img src="<?php echo $selectdp['profile']; ?>" alt="" class="dp">
               <p style="margin: auto;"><?php echo $user; ?></p>
               <form action="profile.php" method="post" enctype="multipart/form-data" id="uploadDp">
                  <div class="p-image">
                     <i class="fa fa-camera upload-button" id="dp"></i>
                     <input class="dp-upload" type="file" name="dp-upload" accept="image/*" />
                  </div>
               </form>
               <div style="margin: 10px;">
                  <a href="edit.php">Edit the profile</a>
               </div>
               <a href="logout.php"> <input type="submit" value="logout" class="outbtn"></a>
            </div>
            <div class="image-panel-head">
               <a href="#" class="typeClick" data-type="all">All</a>
               <a href="#" class="typeClick" data-type="img">Images</a>
               <a href="#" class="typeClick" data-type="vid">Videos</a>
            </div>
            <div class="image-panel">
               <div class="image-panel-left" id="typeShow">
               </div>

               <div>
                  <div class="container">
                     <img id="expandedImg" style="width: 600px;display:none;">
                     <video id="expandedVid" style="width: 600px; height:400px; display:none " controls autoplay></video>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script>
      //IMAGE SHOW
      function myFunction(imgs, val) {
         // console.log(val);
         if (val === 'img') {
            $(document).ready(function() {
               $('#expandedImg').show();
               $('#expandedVid').hide();
            });
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
         } else if (val === 'vid') {
            $(document).ready(function() {
               $('#expandedVid').show();
               $('#expandedImg').hide();
            });
            var expandedVid = document.getElementById("expandedVid");
            expandedVid.src = imgs.src;
         }
      }

      //PROFILE PAGE VIEW
      $(document).ready(function() {
         $('.profile').hide();
         $('.add-icon').on('click', function() {
            $('.profile').toggle();
         });

         //TYPE VIEW
         loadTypeContent('all');
         $('.typeClick').on('click', function(e) {
            // e.preventDefault();
            // var url = $(this).attr("href");
            e.preventDefault();
      var type = $(this).data("type");
      loadTypeContent(type);
         });
      function loadTypeContent(type) {
      var url = "show.php?val=" + type;
            $.ajax({
               url: url,
               type: 'GET',
               data: new FormData(),
               cache: false,
               contentType: false,
               processData: false,
               success: function(response) {
                  // console.log(response);
                  $('#typeShow').html(response);
               }

            })
         }
       

         // DELETE AN IMAGE
         $(document).on("click", ".deletebtn", function(e) {
            e.preventDefault();
            var view = $(this).closest('.column');
            var url = $(this).attr('href');
            $.ajax({
               url: url,
               type: 'GET',
               data: new FormData(),
               cache: false,
               contentType: false,
               processData: false,
               success: function(response) {
                  console.log(response);
                  view.fadeOut(1000, function() {
                     $(this).remove();
                  });
               },
            });
         });

         //PROFILE PIC UPLOADING
         var readurl = function(input) {
            if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function(e) {
                  $('.dp').attr('src', e.target.result);
               }
               reader.readAsDataURL(input.files[0]);
            }
         }
         $(".dp-upload").on('change', function() {
            readurl(this);
            var formData = new FormData($('#uploadDp')[0]);
            $.ajax({
               url: 'profile.php',
               type: 'POST',
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
               success: function(data) {
                  console.log(data);
               },
            });
         });
         $(".upload-button").on('click', function() {
            $(".dp-upload").click();
         });

         //ADDING NEW CONTENT
         $('#add').on('click', function() {
            $('#addNew').click();
         });
         $('#addNew').change(function() {
            var formData = new FormData($('#uploadData')[0]);
            $.ajax({
               url: 'upload.php',
               type: 'POST',
               data: formData,
               cache: false,
               contentType: false,
               processData: false,
               success: function(response) {
                  alert(response);
                  location.reload()
               },
            });
         });

      });
   </script>
</body>

</html>