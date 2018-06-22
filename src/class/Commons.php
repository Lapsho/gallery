<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 18.06.2018
 * Time: 10:58
 */



class Commons extends connectDB{

    /** name site */
    const PAGE_TITLE = 'Lapsho Gallery';
    /** image qty on page */
    const IMAGE_COUNT = 9;


    // apply in contentManag and generateThumbnail
    /** Check directory existing and create it if not
     *
     * @param $path
     * @return bool
     */
    protected function createDir($path)
    {
        if (!file_exists($path)) {
            return mkdir($path, 0777);
        }
        return true;
    }



// isAllowedPage deleteImage  напряму   (contentManag

    /** Check if user is logged in
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
            return true;
        }

        return false;
    }


    /** Get filed value from session
     *
     * @param $field
     * @return string
     */
    public function getFieldValue($field)
    {
        if (isset($_SESSION['fields'][$field])) {
            return $_SESSION['fields'][$field];
        }

        return '';
    }
}

