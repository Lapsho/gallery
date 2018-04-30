<?php

require_once('src/app.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo PAGE_TITLE ?></title>
        <link rel="stylesheet" href="pub/css/bootstrap.css">
        <link rel="stylesheet" href="pub/css/main.css">
        <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
    </head>
    <body>
    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="h1 text-center"><?php echo PAGE_TITLE ?></h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a data-fancybox="gallery" href="<?php echo isset($imageUrl)?$imageUrl:IMAGE_PLACEHOLDER ?>">
                            <img class="card-img-top" alt="Image" src="<?php echo isset($smallImageUrl)?$smallImageUrl:IMAGE_PLACEHOLDER ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>