<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 19.06.2018
 * Time: 23:43
 */

class Collection extends Commons
{

    /** Return array with images
     *
     * @return mixed
     */
    public function getCollection()
    {
        $database = $this->connect();
        $offset = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        $offset = $offset * self::IMAGE_COUNT;
        $sql = "SELECT images.id, image_path, thumbnail_path, author_name, description, created_at, login FROM images
LEFT JOIN users on images.user_id = users.id
LIMIT " . $offset . ", " . self::IMAGE_COUNT;


        $result = $this->request($database, $sql);
        $images = [];
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $value) {
                $images[] = $value;
            }
        } else {
            // set empty array
            $images = [];
        }
        $this->sortImages($images);

        return $images;
    }


    /** Sort array of images
     * @param $images
     */
    protected function sortImages(&$images)
    {
        if (!empty($images)) {
            //sorting part
            usort($images, function ($imageA, $imageB) {
                if ($imageA['created_at'] == $imageB['created_at']) {
                    return 0;
                }
                return ($imageA['created_at'] < $imageB['created_at']) ? -1 : 1;
            });
        }
    }
}