<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 19.06.2018
 * Time: 23:32
 */

class Thumbnail extends Commons
{
    /** defined image placeholder  */
    const IMAGE_PLACEHOLDER = 'https://fakeimg.pl/300x200/282828/eae0d0/?retina=1';
    /** defined constant with path to images stored folder */
    const IMAGE_THUMBNAIL_URL = 'pub/media/thumbnails/';

    /** Generate image thumbnail
     *
     * @param $imagePath
     * @param $width
     * @param $height
     * @return bool|string
     * @throws Exception
     */
    public function generateThumbnail($imagePath, &$width, &$height)
    {
        if (!$this->createDir(self::IMAGE_THUMBNAIL_URL)) {
            return self::IMAGE_PLACEHOLDER;
        }

        $params = $this->getOriginalSize($imagePath);
        $thumbnailPath = $this->resizeImage($imagePath, $width, $height, $params);
        list($width, $height) = $params;
        if ($thumbnailPath) {
            return $thumbnailPath;
        } else {
            return self::IMAGE_PLACEHOLDER;
        }
    }


    /** get image size info
     *
     * @param $imagePath
     * @return array|bool
     */
    protected function getOriginalSize($imagePath)
    {
        return getimagesize($imagePath);
    }


    /** Resize Image
     *
     * @param $imagePath
     * @param $width
     * @param $height
     * @param $params
     * @return bool|string
     * @throws Exception
     */
    protected function resizeImage($imagePath, $width, $height, $params)
    {
        $filename = self::IMAGE_THUMBNAIL_URL . basename($imagePath);
        if (file_exists($filename)) {
            return $filename;
        }

        $mime = $params['mime'];

        //use specific function based on image format
        switch ($mime) {
            case 'image/jpeg':
                $imageCreateFunc = 'imagecreatefromjpeg';
                $imageSaveFunc = 'imagejpeg';
                break;

            case 'image/png':
                $imageCreateFunc = 'imagecreatefrompng';
                $imageSaveFunc = 'imagepng';
                break;

            case 'image/gif':
                $imageCreateFunc = 'imagecreatefromgif';
                $imageSaveFunc = 'imagegif';
                break;

            default:
                throw new Exception('this file format isn\'t supported');
        }

        //Variable function
        $img = $imageCreateFunc($imagePath);

        //list is php construction that allows to set array elements to variables
        list($originalWidth, $originalHeight) = $params;

        //calculate height
        if (!$height) {
            $height = ($originalHeight / $originalWidth) * $width;
        }
        //create new image
        $bufferImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($bufferImage, $img, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

        //return buffer output as string
        ob_start();
        $imageSaveFunc($bufferImage);
        $imageSource = ob_get_clean();

        if (file_put_contents($filename, $imageSource)) {
            return $filename;
        }

        return false;

    }
}