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
  
     <?php

     	for($a = 0; $a < 9; $a++){												//використав цикл for для автоматизації виводу зображень

    	just_for_lulz($img_arr);												//Застосував функцію генерування рандомних посилань
 		echo "<a href=\"" . $fetch_precious . "\" data-fancybox=\"images\">";  
        echo "<img src=\"" . $fetch_precious . "\" />";     					//повернув значення з вище застосованої функції в межає синтаксису html
        echo "</a>";

     	}
     ?>

  </p>
  
  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</body>
 </html> 