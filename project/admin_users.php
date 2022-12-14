<?php

require_once 'config.php';

session_start();

// if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
//    header("Location: ../admin_users.php");
//    exit;
// }
// if (isset($_SESSION['user'])) {
//    header("Location: ../home.php");
//    exit;
// }


// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:login.php');
// }

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}



if(isset($_POST['update_user'])){

   $update_u_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_lname = $_POST['update_lname'];
   $update_email = $_POST['update_email'];
   $update_password = $_POST['update_password'];
   $update_user_type = $_POST['update_user_type'];

   mysqli_query($conn, "UPDATE `users` SET name = '$update_name', lname = '$update_lname', email = '$update_email', password='$update_password', user_type='$update_user_type'  WHERE id = '$update_u_id'") or die('query failed');

   // $update_image = $_FILES['update_image']['name'];
   // $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   // $update_image_size = $_FILES['update_image']['size'];
   // $update_folder = 'uploaded_img/'.$update_image;
   // $update_old_image = $_POST['update_old_image'];

   // if(!empty($update_image)){
   //    if($update_image_size > 2000000){
   //       $message[] = 'image file size is too large';
   //    }else{
   //       mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
   //       move_uploaded_file($update_image_tmp_name, $update_folder);
   //       unlink('uploaded_img/'.$update_old_image);
   //    }
   // }

   header('location:admin_users.php');

}


// to ban users

if(isset($_GET['ban'])){
   $ban_user_id = $_GET['ban'];
   // $ban_start = $_GET['ban_start'];
   $ban_end= new \DateTime();

   // $ban_end = date_add(new \DateTime('now'), date_interval_create_from_date_string("10 days"));
   mysqli_query($conn, "UPDATE  `users` SET ban='yes', ban_start=now(),  ban_end=(DATE_ADD(NOW(), INTERVAL 1440 HOUR_MINUTE )) WHERE id='$ban_user_id' ") or die('query failed');
   
   header('location:admin_users.php');
}

// to unset the ban
// if(isset($_GET['no_ban'])){
//    $ban_user_id = $_GET['ban'];
//    $ban_start = $_GET['ban_start'];
//    mysqli_query($conn, "UPDATE  `users` SET ban='no' WHERE id='$ban_user_id' and ban_start=(DATE_ADD(NOW(), INTERVAL 1 )) ") or die('query failed');
   
//    header('location:admin_users.php');
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users" >

   <h1 class="title"> user accounts </h1>

   <div class="box-container" >
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box" style=" background-color:<?php if($fetch_users['ban'] == 'yes'){ echo 'var(--orange)'; } ?> ">
         <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> user last name : <span><?php echo $fetch_users['lname']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>

         <?php if($fetch_users['ban'] == 'yes'){ echo '<p> User is banned for 1 week from '. $fetch_users['ban_start'] ; } ?> 

         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
         <a href="admin_users.php?update=<?php echo $fetch_users['id']; ?>"   class="btn">Update</a>



         <a href="admin_users.php?ban=<?php echo $fetch_users['id']; ?>" onclick="return confirm('do you want to ban this user?');" class="btn">Ban</a>


      </div>
      <?php
         };
      ?>
   </div>

</section>


<a href="users/create.php" class="btn">Create an account for a new user</a>

<script>
   let date= new Date().toString();
   ajaxcall();
   setInterval(function(){
      ajaxcall
   }, 100000)
</script>


<!-- to update the info about the user -->
<section class="edit-product-form" >
<!-- <section class="edit-user-form" > -->

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <!-- <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>"> -->
      <!-- <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt=""> -->
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter first name">
      <input type="text" name="update_lname" value="<?php echo $fetch_update['lname']; ?>" class="box" required placeholder="enter last name">
      <input type="text" name="update_email" value="<?php echo $fetch_update['email']; ?>" min="0" class="box" required placeholder="email">
      <input type="password" name="update_password" value="<?php echo $fetch_update['password']; ?>" min="0" class="box " required placeholder="password">
      <input type="text" name="update_user_type" value="<?php echo $fetch_update['user_type']; ?>" min="0" class="box" required placeholder="user_type">
      <!-- <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png"> -->
      <input type="submit" value="update" name="update_user" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
      <!-- <input type="reset" value="cancel" id="close-update_user" class="option-btn"> -->

   </form>
   <?php
         }
      }
      }else{
         // echo '<script>document.querySelector(".edit-user-form").style.display = "none";</script>';

         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>






<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>