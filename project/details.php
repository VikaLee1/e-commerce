<?php

include 'config.php';


session_start();



$user_id = $_SESSION['user_id'];




if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = {$id}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $brand=$data['brand'];
        $description =$data['description'];
        $color=$data['color'];
        $size=$data['size'];
        $price=$data['price'];
        $image=$data['image'];
       
      
        
    } else {
        header("location: error.php");
    }
} else {
    header("location: error.php");
}

if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($check_cart_numbers) > 0){
       $message[] = 'already added to cart!';
    }else{
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
   <title>User Update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
    <body>
    <?php include 'header.php'; ?>  

    <div class="heading">
      <h3>Details</h3>
      <p> <a href="home.php">Home</a> / Details</p>
   </div>
       
            <div class="form-container" style="min-height:70%">
            <form class="box" action="details.php"  method="post" enctype="multipart/form-data" style="display: flex;width:90%;gap:3px; justify-content:space-between;">
                <table style="width: 70rem;" >
                <img style="width:35rem;height:40rem;border-radius:5px" class="image" src="uploaded_img/<?php echo $image; ?>" alt="">
                        <tr>
                        <th>Name:</th>
                        <td><?=$name ?></td>
                        </tr>
                        <tr>
                        <th>Brand:</th>
                        <td><?=$brand ?></td>
                        </tr>
                        <tr>
                        <th>Description:</th>
                        <td><?=$description ?></td>
                        </tr>
                        <tr>
                        <th>Color:</th>
                        <td><?=$color ?></td>
                        </tr>
                        <tr>
                        <th>Size:</th>
                        <td><?=$size ?> cm</td>
                        </tr>
                        <tr>
                        <th>Price:</th>
                        <td><?=$price ?> €</td>
                        </tr>
                    
                </table>
               
            </form>
           
            </div>
 <div style="display: flex;justify-content:center">
            <form action="" method="post" class="box">
     
     <input type="hidden" min="1" name="product_quantity" value="1" class="qty">
     <input type="hidden" name="product_name" value="<?php echo $name?>">
     <input type="hidden" name="product_price" value="<?php echo $price ?>">
     <input type="hidden" name="product_image" value="<?php echo $image?>">
     <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     
    
    </form>
    </div>
            




            
        <?php include 'footer.php'; ?>
       

<!-- custom js file link  -->
<script src="js/script.js"></script>
    </body>
</html>
