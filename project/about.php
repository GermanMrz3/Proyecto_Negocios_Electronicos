<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

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

<div class="heading">
   <h3>acerca de</h3>
   <p> <a href="home.php">home</a> / acerca </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="../project/images/Boda6.jpeg" alt="">
      </div>

      <div class="content">
         <h3>¿POR QUÉ ELEGIRNOS?</h3>
         <p>Somos una empresa donde buscamos y realizmos todo aquello que soñaste para tu día especial</p>
         <p>Bright Beauty, es tu mejor opción para llevar tu boda ideal</p>
         <a href="contact.php" class="btn">contactanos</a>
      </div>

   </div>

</section>

<!-- <section class="reviews">

   <h1 class="title">client's reviews</h1>

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
         <h3>john deo</h3>
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
         <h3>john deo</h3>
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
         <h3>john deo</h3>
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
         <h3>john deo</h3>
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
         <h3>john deo</h3>
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
         <h3>john deo</h3>
      </div>

   </div>

</section> -->

<section class="authors">

   <h1 class="title">grandes autores</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/german.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>German Martínez</h3>
      </div>

      <div class="box">
         <img src="images/julio.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Julio Ruiz</h3>
      </div>

      <!-- <div class="box">
         <img src="images/luis.png" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Luis Marroquin</h3>
      </div> -->

      <!-- <div class="box">
         <img src="images/author-4.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/author-5.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/author-6.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>john deo</h3>
      </div> -->

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>