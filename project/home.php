<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
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
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   
   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,400,700,400italic%7CJosefin+Sans:400,700,300italic">
   <link rel="stylesheet" href="css/bootstrap.css">
   <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
   <link rel="stylesheet" href="css/estil.css"> -->
   <link rel="stylesheet" href="css/style.css">
   


</head>
<body>
   
<?php include 'header.php'; ?>

<!-- <section>
<div class="slick-wrap">
          <div class="slick-slider slick-style-1" data-arrows="true" data-autoplay="true" data-loop="true" data-dots="true" data-swipe="true" data-xs-swipe="true" data-sm-swipe="false" data-items="1" data-sm-items="3" data-md-items="3" data-lg-items="3" data-center-mode="true" data-lightgallery="group-slick">
            <div class="item">
              <div class="slick-slide-inner">
                <div class="slick-slide-caption"><a class="thumb-ann thumb-mixed_large" href="images/Boda1.jpg" data-lightgallery="item"><img class="thumb-ann__image" src="images/Boda1.jpg" alt="" width="961" height="664"/>
                    <div class="thumb-ann__caption"> 
                      <p class="thumb-ann__title heading-3">Amor</p>
                      <p class="thumb-ann__text"> “El amor se compone de una sola alma que habita en dos cuerpos”, Aristóteles.</p>
                    </div></a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="slick-slide-inner">
                <div class="slick-slide-caption"><a class="thumb-ann thumb-mixed_large" href="images/Boda2.jpg" data-lightgallery="item"><img class="thumb-ann__image" src="images/Boda2.jpg" alt="" width="961" height="664"/>
                    <div class="thumb-ann__caption"> 
                      <p class="thumb-ann__title heading-3">Amar</p>
                      <p class="thumb-ann__text">“Amar no es mirarse el uno al otro, es mirar juntos es la misma dirección”, Antonie de Saint-Exupéry.</p>
                    </div></a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="slick-slide-inner">
                <div class="slick-slide-caption"><a class="thumb-ann thumb-mixed_large" href="images/Boda3.jpg" data-lightgallery="item"><img class="thumb-ann__image" src="images/Boda3.jpg" alt="" width="961" height="664"/>
                    <div class="thumb-ann__caption"> 
                      <p class="thumb-ann__title heading-3">Te quiero</p>
                      <p class="thumb-ann__text">“Te quiero no por quien eres, sino por quien soy cuando estoy contigo”, Gabriel García Márquez.</p>
                    </div></a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="slick-slide-inner">
                <div class="slick-slide-caption"><a class="thumb-ann thumb-mixed_large" href="images/Boda4.jpg" data-lightgallery="item"><img class="thumb-ann__image" src="images/Boda4.jpg" alt="" width="961" height="664"/>
                    <div class="thumb-ann__caption"> 
                      <p class="thumb-ann__title heading-3">Saber</p>
                      <p class="thumb-ann__text">“Todo lo que sabemos del amor es que el amor es todo lo que hay”, Emily Dickinson.</p>
                    </div></a>
                </div>
              </div>
            </div>
          </div>
        </div>
</section> -->

<section class="home">

   <div class="content">
      <h3>Bright Beauty</h3>
      <p>TUS SUEÑOS HECHOS REALIDAD</p>
      <a href="about.php" class="white-btn">Acerca de nosotros</a>
   </div>

</section>

<section class="products">

   <h1 class="title">últimos productos</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="agregar al carrito" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">carga más</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="../project/images/Boda4.jpg" alt="">
      </div>

      <div class="content">
         <h3>Acerca de</h3>
         <p>Somos una empresa que ayuda a todas aquellas parejas que quieren realizar su boda perfecta</p>
         <a href="about.php" class="btn">Ver más</a>
      </div>

   </div>

</section>

 <!-- Portfolio-->
 <!-- <section class="section section-md bg-white text-center">
        <div class="shell-fluid">
          <p class="heading-1">Portafolio</p>
          <div class="isotope thumb-ruby-wrap wow fadeIn" data-isotope-layout="masonry" data-isotope-group="gallery" data-lightgallery="group">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item"><a class="thumb-ruby thumb-mixed_height-2 thumb-mixed_md" href="images/Catedral.jpg" data-lightgallery="item"><img class="thumb-ruby__image" src="images/Catedral.jpg" alt="" width="440" height="327"/>
                        <div class="thumb-ruby__caption"> 
                          <p class="thumb-ruby__title heading-3">Image #</p>
                          <p class="thumb-ruby__text">If you are looking for high quality wedding photography, I will be glad to help you.</p>
                        </div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item"><a class="thumb-ruby thumb-mixed_height-3 thumb-mixed_md" href="images/Pastel1.jpg" data-lightgallery="item"><img class="thumb-ruby__image" src="images/Pastel1.jpg" alt="" width="444" height="683"/>
                        <div class="thumb-ruby__caption"> 
                          <p class="thumb-ruby__title heading-3">Image #</p>
                          <p class="thumb-ruby__text">If you are looking for high quality wedding photography, I will be glad to help you.</p>
                        </div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item"><a class="thumb-ruby thumb-mixed_height-2 thumb-mixed_md" href="images/Lugar1.jpg" data-lightgallery="item"><img class="thumb-ruby__image" src="images/Lugar1.jpg" alt="" width="440" height="327"/>
                        <div class="thumb-ruby__caption"> 
                          <p class="thumb-ruby__title heading-3">Image #</p>
                          <p class="thumb-ruby__text">If you are looking for high quality wedding photography, I will be glad to help you.</p>
                        </div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item"><a class="thumb-ruby thumb-mixed_height-3 thumb-mixed_md" href="images/Boda7.jpg" data-lightgallery="item"><img class="thumb-ruby__image" src="images/Boda7.jpg" alt="" width="444" height="683"/>
                        <div class="thumb-ruby__caption"> 
                          <p class="thumb-ruby__title heading-3">Image #</p>
                          <p class="thumb-ruby__text">If you are looking for high quality wedding photography, I will be glad to help you.</p>
                        </div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item"><a class="thumb-ruby thumb-mixed_height-2 thumb-mixed_md" href="images/Catedral2.jpeg" data-lightgallery="item"><img class="thumb-ruby__image" src="images/Catedral2.jpeg" alt="" width="440" height="327"/>
                        <div class="thumb-ruby__caption"> 
                          <p class="thumb-ruby__title heading-3">Image #</p>
                          <p class="thumb-ruby__text">If you are looking for high quality wedding photography, I will be glad to help you.</p>
                        </div></a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 isotope-item"><a class="thumb-ruby thumb-mixed_height-2 thumb-mixed_md" href="images/Lugar3.jpeg" data-lightgallery="item"><img class="thumb-ruby__image" src="images/Lugar3.jpeg" alt="" width="440" height="327"/>
                        <div class="thumb-ruby__caption"> 
                          <p class="thumb-ruby__title heading-3">Image #</p>
                          <p class="thumb-ruby__text">If you are looking for high quality wedding photography, I will be glad to help you.</p>
                        </div></a>
              </div>
            </div>
          </div>
        </div>
      </section>-->

<section class="home-contact"> 

   <div class="content">
      <h3>¿Tienes alguna pregunta?</h3>
      <p>Si tienes alguna consulta o duda acerca de los precios o combos, escribenos y con gusto te ayudamos</p>
      <a href="contact.php" class="white-btn">Contactanos</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/core.min.js"></script>
<script src="js/script.js"></script>


</body>
</html>