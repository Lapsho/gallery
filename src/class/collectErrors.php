<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 16.06.2018
 * Time: 21:06
 */

class displayErrors extends Commons{
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


    /** Get messages from session
     *
     * @return bool|string
     */
    public function getMessages()
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

}


