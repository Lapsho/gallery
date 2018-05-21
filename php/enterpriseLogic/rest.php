<?php

/** Move file into destination directory, check directory existing
 *
 * @param $file
 * @return bool|string
 */
function uploadFile($file)
{
    if (!createDir(IMAGE_RESOURCE_URL)) {
        return false;
    }

    $filename = IMAGE_RESOURCE_URL . time() . $file['name'];
    if (move_uploaded_file($file['tmp_name'], $filename)) {
        return $filename;
    }

    return false;
}

/** save data from form to CSV file, check directory existing
 *
 * @param $filename
 * @return bool
 */
function saveData($filename)
{
    if (!createDir(DATA_PATH)) {
        return false;
    }

    $handle = fopen(DATA_PATH . basename($filename) . '.csv', 'w');
    if ($handle) {
        fputcsv($handle, array($_REQUEST['authorname'], $_REQUEST['description']));
    }

    fclose($handle);

    return true;
}

/** save everything including file, form data and generate thumbnail
 *
 * @return bool
 */
function save()
{
    if ($filename = uploadFile($_FILES['image'])) {
        $width = 348;
        $height = 0;
        generateThumbnail($filename, $width, $height);
        if (!saveData($filename)) {
            return false;
        }
    }
    $_SESSION['messages'] = ['You have uploaded new image'];
    unset($_SESSION['fields']);

    return true;
}

/** Get data from CSV file
 *
 * @param $filename
 * @return array|bool|false|null
 */
function getData($filename)
{
    if (file_exists(DATA_PATH . basename($filename) . '.csv')) {
        $handle = fopen(DATA_PATH . basename($filename) . '.csv', 'r');
        if ($handle) {
            return fgetcsv($handle);
        }
        fclose($handle);
    }

    return false;
}

/** Check if user is logged in
 *
 * @return bool
 */
function isLoggedIn()
{
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
        return true;
    }

    return false;
}

/** Check if page is allowed for non logged in users
 *
 * @param $page
 * @return mixed
 */
function isAllowedPage($page)
{
    if (!isLoggedIn() && $page == 'form') {
        header('Location: /');
        exit();
    }

    return $page;
}

/** Authorize user
 *
 * @param $postUser
 * @param $postPass
 * @return bool
 */
function authUser($postUser, $postPass)
{
    if (file_exists(USERS_FILE)) {
        $users = file(USERS_FILE);
        foreach ($users as $user) {
            list($user, $password) = explode(':', $user);
            if (trim($user) == $postUser && trim($password) == $postPass) {
                $_SESSION['auth'] = true;
                $_SESSION['messages'] = ['You have logged in successfuly'];
                unset($_SESSION['fields']);
                return true;
                break;
            }
        }
    }
    $_SESSION['errors'] = ['Incorrect Login'];
    $_SESSION['fields'] = $_POST;

    return false;
}

/** Validate login form field values
 *
 * @param $data
 * @return array|bool
 */
function validateLogin($data)
{
    $errors = array();

    if (empty($data['login'])) {
        $errors[] = 'Login shouldn\'t be empty';
    }

    if (empty($data['pass'])) {
        $errors[] = 'Password shouldn\'t be empty';
    }


    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['fields'] = $data;
        return false;
    } else {
        return true;
    }
}

/** Get filed value from session
 *
 * @param $field
 * @return string
 */
function getFieldValue($field)
{
    if (isset($_SESSION['fields'][$field])) {
        return $_SESSION['fields'][$field];
    }

    return '';
}

/** Get messages from session
 *
 * @return bool|string
 */
function getMessages()
{
    if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
        $messages = '';
        foreach ($_SESSION['messages'] as $message) {
            $messages .= $message . '<br>';
        }
        unset($_SESSION['messages']);
        return $messages;
    }

    return false;
}

/** Unset auth session
 *
 */
function logOut()
{
    unset($_SESSION['auth']);
    $_SESSION['messages'] = ['You have logged out'];
    header('Location: /');
}