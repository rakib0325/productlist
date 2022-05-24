
 <?php 
 
 @include 'config.php';
 error_reporting(0);

   if (isset($_POST['add_product'])){
       $p_name = $_POST['p_name'];
       $p_price = $_POST['p_price'];
       $p_image = $_FILES['p_image']['name'];
       $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
       $p_image_folder = 'uploaded_img/'.$p_image;

       $insert_query = mysqli_query($conn, "INSERT INTO product(name,price,image)VALUES('$p_name','$p_price','$p_image')") or die ('query failed');

       if($insert_query){
           move_uploaded_file($p_image_tmp_name,$p_image_folder);
           $message [] = 'product add success!!';
       }else{
        $message [] = 'product not success!!';
       }
       
       
   }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>

   <!-- font awsome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
   <link rel="stylesheet" href="stylee.css">
   
</head> 
<body>

<?php
if(isset($message)){
    foreach($message as $message){
    echo '<div class="message"><span>'.$message.'</span> <i class="fas fa times" onclick="this.perentElement.style.display =`none`;" ></i></div>';
    };
};
?>



<?php include 'header.php'?>


<div class="container">

<section >
    <form action="" class="add-product-form" method="POST" enctype="multipart/form-data" >
           <h3>Add a new product</h3>
           <input type="text" neme="p_name" placeholder="Enter the Product Nmae" class="box" required>
           <input type="number" neme="p_price"min="0" placeholder="Enter the Product Price" class="box" required>
           <input type="file" neme="p_image" accept="image/png,image/jpg,image/jpeg," class="box" required>
           <input type="submit" value="add the product" name="add_product" class="btn">
    </form>
</section>
</div>




<script src="script.js"></script>
</body>
</html>