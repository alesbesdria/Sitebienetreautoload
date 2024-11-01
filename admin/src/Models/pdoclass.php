<?php

namespace Admin\Models;

use \PDO;
use \PDOException;

class pdoclass extends \PDO
{
    private static $instance;
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASSWORD = '';
    private const DBNAME = 'bienetre';

    private function __construct()
    {
        $_dsn = "mysql:dbname=" . self::DBNAME . ";host=" . self::DBHOST;

        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASSWORD);
            $this->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $this->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}



