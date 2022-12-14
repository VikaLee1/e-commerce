<?php

require_once 'config.php';






?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>




<a href="review/createReview.php" class="btn">Add Review</a>

  

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">
 <?php
      $select_reviews = mysqli_query($conn, "SELECT * FROM `reviews`") or die('query failed');
      if(mysqli_num_rows($select_reviews) > 0){
         while($fetch_reviews = mysqli_fetch_assoc($select_reviews)){
   ?>
      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p><?php echo $fetch_reviews['name']; ?></p>
         <p><?php echo $fetch_reviews['review']; ?></p>
        
         <h3><?php echo $fetch_reviews['name']; ?></h3>
      </div>
<?php
      }
   }else{
      echo '<p class="empty">no review added yet!</p>';
   }
   ?>

      <section class="show-reviews">



</section>

   

   










<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>