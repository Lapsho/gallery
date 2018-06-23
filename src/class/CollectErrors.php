<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 16.06.2018
 * Time: 21:06
 */

class CollectErrors extends Commons{

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
    /** Write error to log file
     *
     * @param $errorNo
     * @param $errorMessage
     * @param $errorFile
     * @param $errorLine
     */
    public function errorHandler($errorNo, $errorMessage, $errorFile, $errorLine)
    {
        $error = 'Error level: ' . $errorNo . ' Text: ' . $errorMessage . ' in file: ' . $errorFile . ' on line: ' . $errorLine . "\n";
        error_log($error, 3, $_SERVER['DOCUMENT_ROOT'] . self::ERROR_LOG);
    }

    /** Write fatal error to log file and show error page
     */
    public function shutDown()
    {
        if ($error = error_get_last()) {
            error_log($error['message'], 3, $_SERVER['DOCUMENT_ROOT'] . self::ERROR_LOG);
            require($_SERVER['DOCUMENT_ROOT'] . 'view/error.php');
        }
    }

    /** Write exception to log and show error page
     *
     * @param $e
     */
    public function exceptionHandler($e)
    {
        error_log($e->$this->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . self::ERROR_LOG);
        require($_SERVER['DOCUMENT_ROOT'] . 'view/error.php');
    }

    /** Check if page is allowed for non logged in users
     *
     * @param $page
     * @return mixed
     */
    public function isAllowedPage($page)
    {
        if ((!$this->isLoggedIn() && $page == 'form') || ($this->isLoggedIn() && ($page == 'login' || $page == 'register'))) {
            header('Location: /');
            exit();
        }

        return $page;
    }
}


