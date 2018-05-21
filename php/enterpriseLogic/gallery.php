<?php


//this function takes the sours url (which contains information about the image in remote resourse)
// processes it and returns the new array of information in format we need (+ create thumbnail)
function formatImages($data)
{

    if (!empty($data)) {

        $images = [];
        $offset = isset($_GET['p']) ? $_GET['p'] - 1 : 0;

        foreach (array_slice($data, $offset * 9, 9) as $key => $value) {

            $originImageURL = imageExist("https://picsum.photos/$value[width]/$value[height]/?image=$value[id]");
            $width = 348;
            $height = 0;
            list($author, $description) = getOriginalSize($originImageURL);

            $images[] = [
                'url' => $originImageURL,
                'author' => $author,
                'description' => $description,
                'created_at' => imageDate(),
                'width' => $width,
                'height' => $height,
                'thumbnail' => generateThumbnail($originImageURL, $width, $height)
            ];
        }
    }else{
        $images = [];
    }
    sortImages($images);
    return $images;
}

/**
 * @param $path
 * @return string
 */
//
function imageExist($path){
    if(!empty(file_exists(IMAGE_RESOURCE_URL . $path))) {
        return IMAGE_RESOURCE_URL . $path;
    }else{
        return INSTEAD_IMAGE;
    }
}


function sortImages($time) {
    return function ($image1, $image2) use ($time) {
        return strnatcmp($image1[$time], $image2[$time]);
    };
}

function imageDate()
{
    return date('d M Y H:i:s', time());
}

?>