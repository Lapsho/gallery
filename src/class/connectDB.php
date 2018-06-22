<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 16.06.2018
 * Time: 21:05
 */

class connectDB{

    const ERROR_LOG = 'var/error.log';
    /** project config file */
    const CONFIG_FILE = 'var/config.ini';

    /** Create connection to database
     * @return PDO
     */
    public function connect()
    {
        try {
            if (file_exists(self::CONFIG_FILE)) {
                $config = parse_ini_file(self::CONFIG_FILE);
                return new PDO($config['engine'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['user'], $config['path']);
            } else {
                throw new Exception('Config file is not exist');
            }
        } catch (PDOException $exception) {
            error_log($exception->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . self::ERROR_LOG);
            echo 'Could not connect to DB';
            exit;
        } catch (Exception $exception) {
            error_log($exception->getMessage(), 3, $_SERVER['DOCUMENT_ROOT'] . self::ERROR_LOG);
            echo 'Could not connect to DB';
            exit;
        }
    }



    /** Process database queries
     *
     * @param PDO $database
     * @param string $sql
     * @param array $params
     * @return bool|int|PDOStatement
     */
    public function request(PDO $database, $sql, $params = [])
    {
        $query = $database->prepare($sql);
        $result = $query->execute($params);
        if ($result === false) {
            error_log($query->errorInfo()[2], 3, $_SERVER['DOCUMENT_ROOT'] . self::ERROR_LOG);
            return false;
        }

        return $query;
    }
}


