<?php

require_once '../config.php';


// if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
//     header("Location: ../../admin_users.php");
//     exit;
// }
// if (isset($_SESSION['user'])) {
//     header("Location: ../../home.php");
//     exit;
// }

if(isset($_POST['submit'])){

   $review = mysqli_real_escape_string($conn, $_POST['review']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, lname, email, password, user_type) VALUES('$name','$lname', '$email', '$cpass', '$user_type')") or die('query failed');
        //  $message[] = 'registered successfully!';
        //  header('../admin_users.php');
      }  
      header('../admin_users.php');
   }
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Review</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Add a review</h3>

      <input type="text" name="name" placeholder="enter your name" required class="box">
     
      
      <select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>

     

      <textarea  cols="55" rows="10" style="border:solid 1px grey;"placeholder="leave your review" ></textarea>


      
      <input type="submit" name="submit" value="create a review" class="btn">

   </form>

</div>

</body>
</html>


