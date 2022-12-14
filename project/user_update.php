<?php

include 'config.php';
session_start();



$user_id = $_SESSION['user_id'];


$select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE id = {$_SESSION["user_id"]}") or die('query failed');

$row = mysqli_fetch_assoc($select_users);

if(isset($_POST['update_user'])){

   $update_u_id = $_POST['update_u_id'];
   $update_name = $_POST['update_name'];
   $update_lname = $_POST['update_lname'];
   $update_email = $_POST['update_email'];
   $update_password = $_POST['update_password'];


   mysqli_query($conn, "UPDATE `users` SET name = '$update_name',lname='$update_lname',email='$update_email' WHERE id = '$update_u_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE id = '$update_u_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:home.php');

}

   



?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="heading">
   <h3>Update your Profile</h3>
   <p> <a href="home.php">home</a> / update profile </p>
</div>


<div class="form-container" style="min-height:70%">

   <form action="" method="post" enctype="multipart/form-data" style="display: flex;width:90%">
      
      <input type="hidden" name="update_u_id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $row['image']; ?>">
      <div >
      <img style="width:35rem;height:40rem;border-radius:5px" src="uploaded_img/<?php echo $row['image']; ?>" alt="">
      </div>
      <div>
      <input type="text" value="<?php echo $row['name']; ?>" name="update_name" placeholder="enter your name" required class="box">
      <input type="text" name="update_lname" placeholder="enter your lname" required class="box" value="<?php echo $row['lname']; ?>">
      <input type="email" value="<?php echo $row['email']; ?>" name="update_email" placeholder="enter your email" required class="box">
      <input type="password" value="<?php echo $row['password']; ?>" name="update_password" placeholder="enter your password" required class="box">
      
      <input type="file" value="<?php echo $row['image']; ?>" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box" >
    <br>
      <input type="submit" name="update_user" value="update now" class="btn">
      </div>
      
   </form>

</div>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>