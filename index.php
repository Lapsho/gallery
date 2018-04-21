<!DOCTYPE html>
<?php
  define('title', "title");                                           // Виніс title в константу
  $imgUrl = "img/damask-dark.png";
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <<?php echo title ?>>Lapsho galery</<?php echo title ?>>            <!-- застосував константу title -->
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

  <p class="imglist">

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
         <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

     <a href="<?php echo $imgUrl; ?>" data-fancybox="images">
        <img src="<?php echo $imgUrl; ?>" />
     </a>

  </p>
  
  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</body>
 </html> 