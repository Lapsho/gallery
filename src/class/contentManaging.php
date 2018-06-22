<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 21.06.2018
 * Time: 5:36
 */


// add, remove image
class contentManaging extends Commons
{
    /** defined constant with path to images stored folder */
    const IMAGE_RESOURCE_URL = 'pub/media/images/';

    /** save everything including file, form data and generate thumbnail
     * @return bool
     * @throws Exception
     */
    public function save()
    {
        $thumbnail = new Thumbnail();
        $database = $this->connect();
        $sql = 'INSERT INTO images(id, image_path, thumbnail_path, description, author_name, created_at, user_id)
VALUES(NULL, :image_path, :thumbnail_path, :description, :author_name, CURRENT_TIMESTAMP(), :user_id)';
        if ($filename = $this->uploadFile($_FILES['image'])) {
            $width = 348;
            $height = 0;
            $params = [
                ':image_path' => $filename,
                ':thumbnail_path' => $thumbnail->generateThumbnail($filename, $width, $height),
                ':description' => $_REQUEST['description'],
                ':author_name' => $_REQUEST['authorname'],
                ':user_id' => $_SESSION['auth'],
            ];
            $this->request($database, $sql, $params);

            $_SESSION['messages'] = ['You have uploaded new image'];
            unset($_SESSION['fields']);

            return true;
        }
        $_SESSION['errors'][] = 'Unable to upload image';

        return false;
    }

    /** Move file into destination directory, check directory existing
     *
     * @param $file
     * @return bool|string
     */
    public function uploadFile($file)
    {
        if (!$this->createDir(self::IMAGE_RESOURCE_URL)) {
            return false;
        }

        $filename = self::IMAGE_RESOURCE_URL . time() . $file['name'];
        if (move_uploaded_file($file['tmp_name'], $filename)) {
            return $filename;
        }

        return false;
    }


    /** Validate upload form field values
     *
     * @param $data
     * @return array|bool
     */
    public function validateUpload($data)
    {
        $errors = array();

        if (empty($data['authorname']) || strlen($data['authorname']) > 40) {
            $errors[] = 'Author shouldn\'t be empty or more 40 characters';
        }

        if (empty($data['description']) || strlen($data['description']) > 255) {
            $errors[] = 'Description shouldn\'t be empty or more 255 characters';
        }
        if (empty($_FILES)) {
            $errors[] = 'You should choose file';
        }
        if (!in_array(getimagesize($_FILES['image']['tmp_name'])['mime'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $errors[] = 'File should be JPEG, PNG, GIF';
        }

        if (!empty($errors)) {
            $_SESSION['fields'] = $data;
            $_SESSION['errors'] = $errors;
            return false;
        } else {
            return true;
        }
    }



    /** Remove image
     *
     * @param $id
     * @return bool
     */
    public function deleteImage($id)
    {
        if ($this->isLoggedIn()) {
            $database = $this->connect();
            $image = $this->request($database, "SELECT image_path, thumbnail_path FROM images WHERE id = :id", [':id' => $id]);
            $this->request($database, "DELETE FROM images WHERE id = :id", [':id' => $id]);
            unlink($image->fetchColumn(0));
            unlink($image->fetchColumn(1));
            $_SESSION['messages'] = ['You have deleted image'];
            return true;
        } else {
            $_SESSION['errors'] = ['You haven\'t permitted to delete images'];
            return false;
        }
    }
}