<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($check_cart_numbers) > 0) {
      $message[] = 'already added to cart!';
   } else {
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <section class="home">

      <div class="content">
         <h3>All about Ski's and Snowboard's</h3>
         <p>When the temperature drops, and lakes and ponds freeze over, and snow begins to fall, for many outdoor sports enthusiasts it means it’s time to head indoors and prepare for next season. But that’s when winter sports fanatics come alive. We know how much you love to get out in the snow and on the ice, and the equipment we’ve gathered here will make all your winter sports activities amazing. Whether your thing is slaloming down a mountain on skis, catching air with your snowboard, sledding or tubing down a hill, exploring a backcountry trail on snowshoes, or gliding along the frozen surface of an ice rink, we’ve got the gear.</p>
         <a href="about.php" class="white-btn">Discover more</a>
      </div>

   </section>

   <section class="products">

      <h1 class="title">Latest Products</h1>

      <div class="box-container">

         <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
         ?>
               <form action="" method="post" class="box">
                  <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                  <div class="name"><?php echo $fetch_products['name']; ?></div>
                  <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                  <input type="number" min="1" name="product_quantity" value="1" class="qty">
                  <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                  <input type="submit" value="add to cart" name="add_to_cart" class="btn">
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
      </div>

      <div class="load-more" style="margin-top: 2rem; text-align:center">
         <a href="shop.php" class="option-btn">Load More</a>
      </div>

   </section>

   <section class="about">

      <div class="flex">

         <div class="image">
            <img src="images/aboutus.jpg" alt="">
         </div>

         <div class="content">
            <h3>About Us</h3>
            <p>Skis, Board, Boots: one-stop shop!
               Race models, speedy carving skis, all-round skis, skis for children and teens.Come to one of our shops and take a closer look at our varied ski models, snowboards and boots which fulfill all safety and comfort standards. Especially if you are looking for ski boots you should trust in experts: try our highly professional ski boot fitting system for splendid ski and snowboard adventures in the snow, right amidst the scenic Ötztal mountains. Accessories, skiing goggles and ski helmets complete the perfect ski equipment of SunUp Sports!</p>
            <a href="about.php" class="btn">Read More</a>
         </div>

      </div>

   </section>

   <section class="home-contact">

      <div class="content">
         <h3>Have any questions?</h3>
         <p>If you have and question of need some information about our products or about our company feel free to contact us.</p>
         <a href="contact.php" class="white-btn">contact us</a>
      </div>

   </section>





   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
   

</body>

</html>