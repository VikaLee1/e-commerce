<?php 
require_once '../config.php';
session_start();


if($_GET['id']){
    $id=$_GET['id'];
    $sql="SELECT * from users WHERE id={$id}";
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==1){
        $data = mysqli_fetch_assoc($result);
        $name=$data['name'];
        $ban_start=$data['ban_start'];
        $ban_end=$data['ban_end'];
    }
}
// else{
//     header("location:../login.php");
// }

    // mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR</title>
       <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="../css/style.css">


</head>

<body>
    <div class="form-container">

<form action="" method="post">
   <h3>ERROR</h3>
   <h2>Your account is temporarily blocked</h2>   
   <p>Expire date: <?php echo $ban_end ?></p>
   <a href="../contact.php"><input type="submit"  value="contact us" class="btn"></a>

   
</form>

</div>

</body>

</html>