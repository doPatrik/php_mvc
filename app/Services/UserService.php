<?php

namespace app\Services;

use app\Base\Database;
use app\Models\Users;
use PDO;

/**
 * Class UserService
 * @package app\Services
 */
class UserService extends Service
{
  /**
   * Get all user from the database.
   *
   * @return $this
   */
  public function getAllUser()
  {
    $this->data = [];
    $this->dbManager = Database::getConnection();
    $sql = "SELECT * FROM users";
    $stmt = $this->dbManager->query($sql);

    while($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $model = new Users();
      $model->fillModel($item);
      $this->data[] = $model;
    }

    return $this;
  }
}
