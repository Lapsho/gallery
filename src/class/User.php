<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 21.06.2018
 * Time: 5:29
 */

// login, logout, authorize user
class User extends ConnectDB
{
    /** Authorize user
     *
     * @param $postUser
     * @param $postPass
     * @return bool
     */
    public function authUser($postUser, $postPass)
    {
        $database = $this->connect();
        $pass = crypt($postPass, $postUser);
        $result = $this->request($database, 'SELECT id FROM users WHERE login = :login AND password = :pass', [':login' => $postUser, ':pass' => $pass]);
        if ($result->rowCount() == 1) {
            $_SESSION['auth'] = $result->fetchColumn(0);
            $_SESSION['messages'] = ['You have logged in successfuly'];
            unset($_SESSION['fields']);
            return true;
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
    public function validateLogin($data)
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



    /** add user info into file and auth user
     *
     * @param $login
     * @param $pass
     * @return bool
     */
    public function createUser($login, $pass)
    {
        $pass = crypt($pass, $login);
        $database = $this->connect();
        if ($this->request($database, 'INSERT INTO users(id, login, password) VALUES(NULL, :login, :pass)', array(':login' => $login, ':pass' => $pass))) {
            $_SESSION['auth'] = $database->lastInsertId();
            $_SESSION['messages'][] = 'Your account has been created';
            return true;
        }
        $_SESSION['errors'][] = 'Something went wrong';
        return false;
    }


    /** Validate registration form
     *
     * @param $data
     * @return bool
     */
    public function validateRegistration($data)
    {
        $errors = array();

        if (empty($data['login'])) {
            $errors[] = 'Login shouldn\'t be empty';
        }

        if (empty($data['pass']) || empty($data['repass'])) {
            $errors[] = 'Password shouldn\'t be empty';
        }

        if ($data['pass'] != $data['repass']) {
            $errors[] = 'Passwords don\'t match';
        }


        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['fields'] = $data;
            return false;
        } else {
            return true;
        }
    }


    /** Unset auth session
     *
     */
    public function logOut()
    {
        unset($_SESSION['auth']);
        $_SESSION['messages'] = ['You have logged out'];
        header('Location: /');
    }
}