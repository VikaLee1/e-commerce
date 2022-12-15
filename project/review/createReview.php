<?php
session_start();
require_once '../config.php';


// if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
//     header("Location: ../../admin_users.php");
//     exit;
// }
// if (isset($_SESSION['user'])) {
//     header("Location: ../../home.php");
//     exit;
// }

// $sql1 = mysqli_query($conn, "SELECT * 
// FROM `users` 
// JOIN `reviews` ON reviews.fk_user_id=users.id
// JOIN `orders` ON orders.id=reviews.fk_product_id

// ");
// $result = mysqli_query($conn, $sql1);
// $tbody='';

// if(mysqli_num_rows($sql1) > 0){
//    while($row = mysqli_fetch_assoc($result)){
//       $tbody .="
//       <p>".$row['name']."</p>
//       ";
//       echo $tbody;
//    } 
// } 


if(isset($_POST['submit'])){
  
   $id=$_SESSION['user_id'];
   $review=$_POST['review'];

   $sql = "SELECT * FROM orders WHERE `user_id`=$id";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $orderid = $row["id"];
   // $fk_user_id=$_SESSION['fk_user_id'];
   // $fk_product_id=$_SESSION['fk_product_id'];

  

       mysqli_query($conn, "INSERT INTO `reviews`(review, fk_user_id, fk_product_id) VALUES('$review',$id, $orderid)") or die('query failed');
         header('location:../about.php');
      }  
     
   

   mysqli_close($conn);


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




   
<div class="form-container">

   <form action="" method="post">
      <h3>Add a review</h3>
     
     

     

      <textarea  cols="55" rows="10" style="border:solid 1px grey;"placeholder="leave your review" name="review"></textarea>


      
      <input type="submit" name="submit" id="submit" value="create a review" class="btn">

   </form>

</div>

</body>
</html>


