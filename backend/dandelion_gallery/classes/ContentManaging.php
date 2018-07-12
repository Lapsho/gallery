<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 21.06.2018
 * Time: 5:36
 */


/** Help save and remove image width validation
 *
 * Class ContentManaging
 */
class ContentManaging extends Commons
{
    /** defined constant with path to images stored folder */
    const IMAGE_RESOURCE_URL = 'content/media/images/';

    /** save everything including file, form data and generate thumbnail
     *
     * @return bool
     * @throws Exception
     */
    public function save($connectDB)
    {
        $thumbnail = new Thumbnail();
        $database = $connectDB->connect();
        $sql = 'INSERT INTO images(id, image_path, thumbnail_path, description, author_name, category, created_at, user_id)
VALUES(NULL, :image_path, :thumbnail_path, :description, :author_name, :category, CURRENT_TIMESTAMP(), :user_id)';
        if ($filename = $this->uploadFile($_FILES['image'])) {
            $width = 348;
            $height = 0;
            $params = [
                ':image_path' => $filename,
                ':thumbnail_path' => $thumbnail->generateThumbnail($filename, $width, $height),
                ':description' => $_REQUEST['description'],
                ':author_name' => $_REQUEST['authorname'],
                ':category' => $_REQUEST['category'],
                ':user_id' => $_SESSION['auth'],
            ];
            $connectDB->request($database, $sql, $params);

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

        if (strlen($data['authorname']) > 40) {
            $errors[] = 'Author shouldn\'t be empty or more 40 characters';
        }

        if (empty($data['description']) || strlen($data['description']) > 250) {
            $errors[] = 'Description shouldn\'t be empty or more 250 characters';
        }
        if (empty($_FILES)) {
            $errors[] = 'You should choose file';
        }
        if (htmlentities($data['authorname']) != $data['authorname']) {
            $errors[] = 'The author may only contain letters, numbers, and punctuation marks';
        }
        if (htmlentities($data['description']) != $data['description']) {
            $errors[] = 'The description may only contain letters, numbers, and punctuation marks';
        }
        if (empty($data['category'])) {
            $errors[] = 'Category shouldn\'t be empty';
        }
        if (!in_array(getimagesize($_FILES['image']['tmp_name'])['mime'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $errors[] = 'File should be JPEG, PNG, GIF and shouldn\'t be empty';
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
    public function deleteImage($id, $connectDB)
    {
        if ($this->isLoggedIn()) {
            $database = $connectDB->connect();
            $image = $connectDB->request($database, "SELECT image_path, thumbnail_path FROM images WHERE id = :id", [':id' => $id]);
            $connectDB->request($database, "DELETE FROM images WHERE id = :id", [':id' => $id]);
            $patch = $image->fetchAll();
            unlink($patch[0][0]);     //delete image
            unlink($patch[0][1]);     //delete thumbnail
            $_SESSION['messages'] = ['You have deleted image'];
            return true;
        } else {
            $_SESSION['errors'] = ['You haven\'t permitted to delete images'];
            return false;
        }
    }
}