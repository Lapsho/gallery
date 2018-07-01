<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 18.06.2018
 * Time: 10:58
 */


/** Contain commons methods and constant for several classes
 *
 * Class Commons
 */
class Commons extends ConnectDB
{

    /** name site */
    const PAGE_TITLE = 'Dandelion Gallery';
    /** image qty on page */
    const IMAGE_COUNT = 9;
    /** defined image placeholder  */
    const IMAGE_PLACEHOLDER = '/frontend/program_images/placeholder.png';
    /** contain href to all css files */
    const CSS_PATH = 'backend/dandelion_gallery/helpers/css.php';
    /** contain href to fancybox files */
    const FANCYBOX_PATH = 'backend/dandelion_gallery/helpers/fancybox.php';


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

