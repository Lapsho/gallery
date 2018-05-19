
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
        <a href='form'> <input type="submit" value="upload image"> </a>
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
    </div>
  </div>


  <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

</body>

 </html>
