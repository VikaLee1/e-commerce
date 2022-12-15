<?php

require_once 'config.php';

session_start();

$user_id = $_SESSION['user_id'];


// if (!isset($user_id)) {
//    header('location:login.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
  
   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>About Us</h3>
      <p> <a href="home.php">Home</a> / About </p>
   </div>

   <section class="about">

      <div class="flex">

         <div class="image">
            <img src="images/aboutus.jpg" alt="">
         </div>

         <div class="content">
            <h3>Why choose us?</h3>
            <p>An unforgettable experience, customized to your needs.
               Join us for an unforgettable experience that will not only help you progress your skiing and riding abilities – but one that will continue to infuse passion into your time on the slopes. </p>
            <p>We customize our courses to meet your personal goals and objectives. Let us take care of all of the details to build your own UNLIMITED experience.</p>
            <a href="contact.php" class="btn">Contact Us</a>
         </div>

      </div>

   </section>




   <section class="reviews">

      <h1 class="title">Client's reviews</h1>
     <center><a href="review/createReview.php" class="btn">Add Review</a>
</center>

   <div class="box-container">
 <?php
      // $select_reviews = mysqli_query($conn, "SELECT * FROM `reviews`") or die('query failed');
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
         <img src="uploaded_img/<?php echo $fetch_reviews['image']; ?>" alt="">
         <p><?php echo $fetch_reviews['name']; ?></p>
         <p><?php echo $fetch_reviews['review']; ?></p>
         <p>Products ordered:<?php echo $fetch_reviews['total_products']; ?></p>
        
        
      </div>
<?php
      }
   }else{
      echo '<p class="empty">no review added yet!</p>';
   }
   ?>

      
</section>
   
   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>