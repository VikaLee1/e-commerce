<?php

include 'config.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = {$id}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
      
        
    } else {
        header("location: error.php");
    }
    mysqli_close($conn);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
       
        <link rel="stylesheet" href="style.css">
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 50px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 90px !important;
                height: 90px !important;
            }     
            .bg{
                background-color:beige;
            }
           
        </style>
    </head>
    <body class="bg">
        <fieldset>
            <legend class='h2'>Details</legend>
            <form action="details.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                <tr>
                        <th>Name</th>
                        <td><?=$name ?></td>
                    </tr>    
                    
                    <tr> 
                        <td><a href= "shop.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>
