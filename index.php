<?php require_once "php/image.php";  ?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>	<?php if(!empty(GALLERY)) {echo GALLERY;} else{echo "лажа";} ?>	</title>    <!-- перевірив та застосував константу title -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="general">
    <div class="container"> 
        <ul class="imglist">

         <?php foreach(insteadDB() as $key => $value): ?>
             <li>
                 <a href="<?php echo $value['urlImage']; ?>" data-fancybox='images'>
                     <img src="<?php echo $value['thumbnail']; ?>" />
                 </a>
                 <p><?php echo $value['time']; ?></p>
             </li>
         <?php endforeach; ?>
        </ul>
        <?php
        /*текущая страница*/

        $iCurr = (empty($_GET['page']) ? 1 : intval($_GET['page']));

        /*всего страниц или конечная страница*/

        $iLastPage = 45;

        /*левый и правый лимиты*/

        $iLeftLimit = 4;
        $iRightLimit = 5;

        /*вызов функции*/
        makePager($iCurr, $iLastPage, $iLeftLimit, $iRightLimit) ;
        ?>
    </div>
  </div>


  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</body>

 </html>
