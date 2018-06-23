<?php

//Generate image thumbnail in base64
function generateThumbnail($imagePath, &$width, &$height)
{
    if (!createDir(IMAGE_THUMBNAIL_URL)) {
        return INSTEAD_IMAGE;
    }

    $params = getOriginalSize($imagePath);
    $thumnailPath = resizeImage($imagePath, $width, $height, $params);
    list($width, $height) = $params;

    if ($thumnailPath) {
        return $thumnailPath;
    } else {
        return INSTEAD_IMAGE;
    }
}



function createDir($path)
{
    if (!file_exists($path)) {
        return mkdir($path, 0777);
    }
    return true;
}




//Resize Image
function resizeImage($imagePath, &$width, &$height, $params)
{

    $filename = IMAGE_THUMBNAIL_URL . basename($imagePath);
    if (file_exists($filename)) {
        return $filename;
    }

    $mime = $params['mime'];
    //use specific function based on image format
    switch ($mime) {
        case 'image/jpeg':
            $imageCreateFunc = 'imagecreatefromjpeg';
            $imageSaveFunc = 'imagejpeg';
            break;
        case 'image/png':
            $imageCreateFunc = 'imagecreatefrompng';
            $imageSaveFunc = 'imagepng';
            break;
        case 'image/gif':
            $imageCreateFunc = 'imagecreatefromgif';
            $imageSaveFunc = 'imagegif';
            break;
        default:
            //we will handle this once work with errors
    }
    //Variable function
    $img = $imageCreateFunc($imagePath);
    //list is php construction that allows to set array elements to variables
    list($originalWidth, $originalHeight) = $params;
    //calculate height
    if (!$height) {
        $height = ($originalHeight / $originalWidth) * $width;
    }
    //create new image
    $bufferImage = imagecreatetruecolor($width, $height);
    imagecopyresampled($bufferImage, $img, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

    //return buffer output as string
    ob_start();
    $imageSaveFunc($bufferImage);
    $imageSource = ob_get_clean();

    if (file_put_contents($filename, $imageSource)) {
        return $filename;
    } else{
        return false;
    }
}

//get image size info
function getOriginalSize($imagePath)
{
    return getimagesize($imagePath);
}

?>