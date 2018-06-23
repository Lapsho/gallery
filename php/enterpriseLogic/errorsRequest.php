<?php

/** Get errors from request
 *
 * @return bool|string
 */
function getErrors()
{
    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        $errors = '';
        foreach ($_SESSION['errors'] as $error) {
            $errors .= $error . '<br>';
        }
        unset($_SESSION['errors']);
        return $errors;
    }

    return false;
}
