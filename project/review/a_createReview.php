<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

session_start();
require_once '../config.php';
// require_once '../../components/file_upload.php';



if($_POST){
    $name=$_POST['name'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    // $picture=file_upload($_FILES['picture']);
    $user_type=$_POST['user_type'];
    
    $uploadError='';

    $sql="INSERT into users (name, lname, email, password, user_type) VALUES('$name', '$lname', '$email','$password','$user_type') ";
    
    if(mysqli_query($conn,$sql)){
        $class="success";
        $message="The new account has been successfully created<br>
        <table class='table w-50'><tr>
        </tr></table><hr>";
       
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $conn->error;
    }
    mysqli_close($conn);
}else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creating new account</title>
   

</head>
<body>
<div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
            <p><?= $uploadError; ?></p>
            <a href='../admin_users.php'><button class="btn " type='button' style='background:#D0B8A8'>Home</button></a>
        </div>
    </div>
</body>
</html>