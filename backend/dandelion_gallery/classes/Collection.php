<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 19.06.2018
 * Time: 23:43
 */

/** Contains different methods for fetching images data from DB
 *
 * Class Collection
 */
class Collection extends Commons
{
    /** Contains a path to an image that appears when the collection is empty  */
    const NO_IMAGES = '/frontend/program_images/no_images.png';

    /** Causes the required method to sort the gallery
     *
     * @return array|mixed
     */
    public function switchCollections()
    {
        switch ($_SESSION['switch_collections']) {
            case 'own':
                return $this->getOwnCollection();
                break;
            case 'Another':
            case 'Art':
            case 'Buildings':
            case 'Macro':
            case 'Interior':
            case 'Wall':
            case 'Paisajes':
            case 'People':
            case 'Machinery':
                return $this->getCategory();
                break;
            default:
                return $this->getCollection();
                break;
        }
    }


    /** Return array with images
     *
     * @return mixed
     */
    public function getCollection()
    {
        $database = $this->connect();
        $offset = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        $offset = $offset * self::IMAGE_COUNT;
        $sql = "
SELECT images.id, image_path, thumbnail_path, author_name, description, category, created_at, login, user_id FROM images
LEFT JOIN users on images.user_id = users.id
ORDER BY created_at DESC
LIMIT " . $offset . ", " . self::IMAGE_COUNT;
        $result = $this->request($database, $sql);
        $images = [];
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $value) {
                $value['image_path'] = $this->imageExists($value['image_path']);
                $value['thumbnail_path'] = $this->imageExists($value['thumbnail_path']);
                $images[] = $value;
            }
        } else {
            // set empty array
            $images = [];
        }
        $this->sortImages($images);

        return $images;
    }


    /** Return array only with images user that authorized
     *
     * @return array
     */
    public function getOwnCollection()
    {
        $database = $this->connect();
        $offset = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        $offset = $offset * self::IMAGE_COUNT;
        $sql = "
SELECT images.id, image_path, thumbnail_path, author_name, description, category, created_at, login, user_id 
FROM images LEFT JOIN users on images.user_id = users.id 
WHERE images.user_id = " . $_SESSION['auth'] . "
ORDER BY created_at DESC
LIMIT " . $offset . ", " . self::IMAGE_COUNT;
        $result = $this->request($database, $sql);
        $images = [];
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $value) {
                $value['image_path'] = $this->imageExists($value['image_path']);
                $value['thumbnail_path'] = $this->imageExists($value['thumbnail_path']);
                $images[] = $value;
            }
        } else {
            // set empty array
            $images = [];
        }
        $this->sortImages($images);

        return $images;
    }

    /** Returns the image of the selected category
     *
     * @return array
     */
    public function getCategory()
    {
        $database = $this->connect();
        $offset = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        $offset = $offset * self::IMAGE_COUNT;
        $sql = "
SELECT images.id, image_path, thumbnail_path, author_name, description, category, created_at, login, user_id FROM images
LEFT JOIN users on images.user_id = users.id 
WHERE images.category = " . "'" . $_SESSION['switch_collections'] . "'" . "
ORDER BY created_at DESC
LIMIT " . $offset . ", " . self::IMAGE_COUNT;
        $result = $this->request($database, $sql);
        $images = [];
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $value) {
                $value['image_path'] = $this->imageExists($value['image_path']);
                $value['thumbnail_path'] = $this->imageExists($value['thumbnail_path']);
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
     *
     * @param $images
     */
    public function sortImages(&$images)
    {
        if (!empty($images)) {
            //sorting part
            usort($images, function ($imageA, $imageB) {
                if ($imageA['created_at'] == $imageB['created_at']) {
                    return 0;
                }
                return ($imageA['created_at'] < $imageB['created_at']) ? +1 : -1;
            });
        }
    }


    /** checks the existence of the file
     *
     * @param $imagePath
     * @return string
     */
    public function imageExists($imagePath)
    {
        if (file_exists($imagePath)) {
            return $imagePath;
        } else {
            $imagePath = self::IMAGE_PLACEHOLDER;
            return $imagePath;
        }
    }
}
