<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

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

      <div class="box-container">

         <div class="box">
            <img src="images/pic-1.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Peter Mc Gregor </h3>
         </div>

         <div class="box">
            <img src="images/pic-2.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Sarah Jones</h3>
         </div>

         <div class="box">
            <img src="images/pic-3.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Jonny Dean </h3>
         </div>

         <div class="box">
            <img src="images/pic-4.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Julia Anderson</h3>
         </div>

         <div class="box">
            <img src="images/pic-5.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Eric Harwards</h3>
         </div>

         <div class="box">
            <img src="images/pic-6.png" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ad, quo labore fugiat nam accusamus quia. Ducimus repudiandae dolore placeat.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Nina Sommer</h3>
         </div>

      </div>

   </section>

   <section class="authors">

      <h1 class="title">Create Authors</h1>

      <div class="box-container">

         <div class="box">
            <img src="images/author-1.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Richard Gate</h3>
         </div>

         <div class="box">
            <img src="images/author-2.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Sarah Jones</h3>
         </div>

         <div class="box">
            <img src="images/author-3.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Thomas Müller</h3>
         </div>

         <div class="box">
            <img src="images/author-4.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Antonia Miller</h3>
         </div>

         <div class="box">
            <img src="images/author-5.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>John Dow </h3>
         </div>

         <div class="box">
            <img src="images/author-6.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Andrea Mc Kartney</h3>
         </div>

      </div>

   </section>







   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>