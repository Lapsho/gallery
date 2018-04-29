<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <?php require_once "php/image.php";  ?>
  <title>	<?php if(!empty(title)) {echo title;} else{echo "лажа";} ?>	</title>    <!-- перевірив та застосував константу title -->
  <link rel="stylesheet" href="css/style.css">
</head>


<body>
  <div class="general">

    <form id="limit_img" method="GET">
      <p>Введіть кількість зображень, що потрібно відобразити(максимум <?php echo $limit_img ?>): <input type="number" name="max_num_img" />

      <input type="submit" value="завантажити"></p>
    </form>

    <div class="container"> 
        <ul class="imglist">

          <?php
          for($a = 0; $a < $max_num_img; $a++){    //I decided to use exactly this type cycle because. just because
            fetch_img($img_arr, $a);
            echo $fetch_precious;
          }
          ?>

        </ul>
    </div> 
  </div>


  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</body>

 </html>
