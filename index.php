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
    <div class="container"> 
        <ul class="imglist">

         <?php foreach($new_arr as $sub_arr): ?>
             <li>
                 <a href="<?php echo $sub_arr['url']; ?>" data-fancybox='mages'>
                     <img src="<?php echo $sub_arr['url']; ?>" />
                 </a>
                 <p><?php echo date('d F Y H:i:s', $sub_arr['timestamp']); ?></p>
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
