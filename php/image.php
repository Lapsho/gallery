<?php

define('GALLERY', "Lapsho gallery");
define('JSON_DATA', "https://picsum.photos/list");
define('INSTEAD_IMAGE', 'https://fakeimg.pl/300x200/282828/eae0d0/?retina=1');


//this function takes the value of the old array (which contains some of the information needed)
// processes it and returns the new array to the information we need
function insteadDB($soursURL)
{
    $imageDataArray = array();
    if (!empty($soursURL)) {
        $jsonArrayImage = array_slice(json_decode(file_get_contents($soursURL), true), 0, 9);

        foreach ($jsonArrayImage as $key => $value) {

            $originImageURL = imageExist("https://picsum.photos/$value[width]/$value[height]/?image=$value[id]");

            $imageData['urlImage'] = $originImageURL;
            $imageData['author'] = $value['author'];
            $imageData['time'] = imageDate();

            $imageDataArray[] = $imageData;

            //TODO doesn`t work - need understad why
            /*
            $iamgeDataArray[] = [
                'urlImage' => $originImageURL,
                'author' => $value['author'],
                'time' => imageDate()
            ];
            */

        }
        buildSorter($imageDataArray);
        return $imageDataArray;
    }
}

function imageExist($path){
    if(!empty($path)) {
        return $path;
    }else{
        return INSTEAD_IMAGE;
    }
}

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

$imageArray = insteadDB(JSON_DATA);

?>