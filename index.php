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
      <p>Введіть кількість зображень, що потрібно відобразити (максимум <?php echo $image_number_limit ?>): <input type="number" min="1" name="num_user_img" value="<?php echo $num_user_img; ?>"/>

      <input type="submit" value="завантажити"></p>
    </form>

    <div class="container"> 
        <ul class="imglist">

          <?php

          foreach($img_arr as $key_inner_arr){
            fetch_img($key_inner_arr);
            echo $fetch_precious;

            static $counter;           //when $counter will equal ours limit - cycle will stop
            $counter++;

            if($counter == $num_user_img){
              break;
            } 
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
