<?php

define('title', "Lapsho gallery");   

//the function checks the existence of the data, in the case of a true, decompresses them as an new associative array
function path_exist($path, &$fetch_data){
    if(!empty($path)) {
        $fetch_data = json_decode($path,true);
        return $fetch_data;
    }else{
        echo "perhaps the way does not lead anywhere (in fact, the variable is empty, that's for sure).";
    }
}

//this function takes the value of the old array (which contains some of the information needed)
// processes it and returns the new array to the information we need
function instead_db($old_arr, &$new_arr){
    foreach($old_arr as $image_data){
        $origin_img_url = "https://picsum.photos/$image_data[width]/$image_data[height]/?image=$image_data[id]";
        $new_sub_arr = getimagesize($origin_img_url);


        $new_sub_arr["url"] = $origin_img_url;
        $new_sub_arr["timestamp"] = time();
        $new_arr[] = $new_sub_arr;
    }
    return $new_arr;
}

// comparison value of the key using the "natural order" algorithm
function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}


$json_file = file_get_contents("https://picsum.photos/list");


path_exist($json_file, $json_array_image);

$json_array_image = array_slice($json_array_image,0, 5);


instead_db($json_array_image,$new_arr);

usort($new_arr, build_sorter('timestamp'));
?>