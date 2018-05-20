<?php
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