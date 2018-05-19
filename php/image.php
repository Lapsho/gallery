<?php

define('GALLERY', "Lapsho gallery");
define('JSON_DATA', "https://picsum.photos/list");
define('INSTEAD_IMAGE', 'https://fakeimg.pl/300x200/282828/eae0d0/?retina=1');


//this function takes the sours url (which contains information about the image in remote resourse)
// processes it and returns the new array of information in format we need (+ create thumbnail)
function insteadDB()
{
//    $imageDataArray = array();

    if (!empty(JSON_DATA)) {
        $jsonArrayImage = array_slice(json_decode(file_get_contents(JSON_DATA), true), 0, 9);

        foreach ($jsonArrayImage as $key => $value) {

            $originImageURL = imageExist("https://picsum.photos/$value[width]/$value[height]/?image=$value[id]");
            $width = 348;
            $height = 0;

            $imageData['urlImage'] = $originImageURL;
            $imageData['author'] = $value['author'];
            $imageData['time'] = imageDate();
       //     $imageData['thumbnail'] = generateThumbnail($originImageURL, $width, $height);
            $imageData['thumbnail'] = INSTEAD_IMAGE;


            $imageDataArray[] = $imageData;

            //TODO doesn`t work - need understad why
//
//            $iamgeDataArray[] = [
//                'urlImage' => $originImageURL,
//                'author' => $value['author'],
//                'time' => imageDate(),
//                'thumbnail' => generateThumbnail($originImageURL, $width, $height)
//            ];

        }

    }
    buildSorter($imageDataArray);
    return $imageDataArray;
}

/**
 * @param $path
 * @return string
 */
//
function imageExist($path){
    if(!empty($path)) {
        return $path;
    }else{
        return INSTEAD_IMAGE;
    }
}


//TODO fix this
// comparison value of the key using the "natural order" algorithm
function buildSorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

function imageDate()
{
    return date('d M Y H:i:s', time());
}



//Generate image thumbnail in base64
function generateThumbnail($imagePath, &$width, &$height)
{
    $params = getOriginalSize($imagePath);
    return 'data:' . $params['mime'] . ';base64,' . base64_encode(resizeImage($imagePath, $width, $height, $params));
}

//Resize Image
function resizeImage($imagePath, &$width, &$height, $params)
{
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
    //save original image size to variables for later use outside of function
    $width = $originalWidth;
    $height = $originalHeight;
    //return buffer output as string
    ob_start();
    $imageSaveFunc($bufferImage);
    return ob_get_clean();
}

//get image size info
function getOriginalSize($imagePath)
{
    return getimagesize($imagePath);
}



///////////////////////////////////////////////
/**Validate field values
 * @param $data
 * @return array|bool
 */
function valid($data){
    $errors[] = array();


        $author = test_input($data['authorname']);
        $description = test_input($data['description']);


        if (empty($author)) {
            $errors[] = "You did not enter author field";
        }

        if (mb_strlen($author, 'UTF-8') > 40) {
            $errors[] = "The author's field is too long (max 40)";
        }

        if (empty($description)) {
            $errors[] = "You did not enter description field";
        }

        if (mb_strlen($description, 'UTF-8') > 250) {
            $errors[] = "The author's field is too long (max 250)";
        }

        if (isset($_FILES['sendImage']) && (!in_array(getimagesize($_FILES['sendImage']['tmp_name'])['mime'], ['image/jpeg', 'image/png', 'image/gif']))) {
            $errors[] = 'You did not select a file or it`s not JPEG, PNG or GIF';
        }

    if(empty($errors)){
        return true;
    }else{
        return $errors;
    }
}

/**cuts and shields from html code
 * @param $data
 * @return string
 */
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>