<?php

/** Validate upload form field values
 *
 * @param $data
 * @return array|bool
 */
function validateUpload($data)
{
    $errors = array();

    if (empty($data['authorname']) || strlen($data['authorname']) > 100) {
        $errors[] = 'Author shouldn\'t be empty or more 40 characters';
    }

    if (empty($data['description']) || strlen($data['description']) > 255) {
        $errors[] = 'Description shouldn\'t be empty or more 255 characters';
    }
    if (empty($_FILES)) {
        $errors[] = 'You should choose file';
    }
    if (!in_array(getimagesize($_FILES['image']['tmp_name'])['mime'], ['image/jpeg', 'image/png', 'image/gif'])) {
        $errors[] = 'File should be JPEG, PNG, GIF';
    }

    if (!empty($errors)) {
        $_SESSION['fields'] = $data;
        $_SESSION['errors'] = $errors;
        return false;
    } else {
        return true;
    }
}

//TODO don`t see vhere it apply
/** Processing data from form
 *
 * @param $data
 */
function process(&$data)
{
    if (is_array($data)) {
        foreach ($data as &$value) {
            addslashes($value);
        }
    }
}