<?php

require_once 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE   FROM `reviews` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_about.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>reviews</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="messages">

   <h1 class="title"> client's reviews </h1>

   <div class="box-container">
   <?php
      // $select_reviews = mysqli_query($conn, "SELECT * FROM `reviews`");
      $id=$_SESSION['user_id'];
      $sql=mysqli_query($conn, "SELECT * 
      FROM `users` 
      JOIN `reviews` ON reviews.fk_user_id=users.id
      JOIN `orders` ON orders.id=reviews.fk_product_id" );
      if(mysqli_num_rows($sql) > 0){
         while($fetch_reviews = mysqli_fetch_assoc($sql)){
            // var_dump($fetch_reviews);
   ?>
      <div class="box">
         <p><?php echo $fetch_reviews['name']; ?></p>
         <p><?php echo $fetch_reviews['review']; ?></p>
         <p>Products ordered:<?php echo $fetch_reviews['total_products']; ?></p>

         <a href="admin_about.php?delete=<?php echo $fetch_reviews['id']; ?>" class="delete-btn" onclick="return confirm('delete this review?');">delete</a>
        
        
      </div>
<?php
      }
   }else{
      echo '<p class="empty">no review added yet!</p>';
   }
   ?>

   </div>

</section>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>