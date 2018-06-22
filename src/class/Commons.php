<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 18.06.2018
 * Time: 10:58
 */



class Commons extends connectDB{

    /** defined image placeholder  */
    const IMAGE_PLACEHOLDER = 'https://fakeimg.pl/300x200/282828/eae0d0/?retina=1';
    /** defined constant with path to images stored folder */
    const IMAGE_THUMBNAIL_URL = 'pub/media/thumbnails/';

    //uploadFile(), generateThumbnail(),
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



// isAllowedPage deleteImage  напряму

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
}

