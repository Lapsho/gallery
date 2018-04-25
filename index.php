<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <?php require_once "random_image.php";  ?>
  <title>	<?php if(!empty(title)) {echo title;} else{echo "лажа";} ?>	</title>    <!-- перевірив та застосував константу title -->
  <link rel="stylesheet" href="css/style.css">
</head>


<body>

  <form method="GET">
  	<p>Введіть кількість зображень, що потрібно відобразити: <input type="number" name="max_num_img" />
  	<input type="submit" value="завантажити"></p>
  </form>

  <p class="imglist">
  
     <?php

     	for($a = 0; $a < $max_num_img; $a++){	//використав цикл for для автоматизації виводу зображень

    	just_for_lulz($img_arr);				//Застосував функцію генерування рандомних посилань
 		echo $fetch_precious;					//вся необхідна для виведення в html писанина міститься в одній змінній	

     	}
     ?>

  </p>
  
  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</body>
 </html>
