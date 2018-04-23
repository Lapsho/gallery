<!DOCTYPE html>
<?php
  include "random_image.php";  //підключив random_image.php
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <<?php echo title ?>>Lapsho galery</<?php echo title ?>>            <!-- застосував константу title -->
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

  <p class="imglist">

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">  <!--застосував функцію генерування рандомних посилань -->
        <img src="<?php echo $fetch_precious; ?>" />                      <!--повернув значення з вище застосованої функції (щоб файл, що відкривається співпадав з його іконкою) -->
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>

     <a href="<?php just_for_lulz($img_arr); ?>" data-fancybox="images">
        <img src="<?php echo $fetch_precious; ?>" />
     </a>
  </p>
  
  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</body>
 </html> 