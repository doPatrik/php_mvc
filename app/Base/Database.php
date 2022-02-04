<?php

namespace app\Base;

use PDO;

define('HOST', 'localhost');
define('DATABASE', 'php_mvc');
define('USER', 'root');
define('PASSWORD', '');

/**
 * This class is represent the Database connection
 *
 * Class Database
 * @package app\Base
 */
class Database
{
  private static $connection = false;

  /**
   * This static function is return with the PDO instance
   *
   * @return bool|PDO
   */
  public static function getConnection()
  {
    if(!self::$connection) {
      self::$connection = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD,
      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    return self::$connection;
  }
}
