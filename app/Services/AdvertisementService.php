<?php

namespace app\Services;

use app\Base\Database;
use app\Models\Advertisements;
use app\Models\Users;
use PDO;

/**
 * Class AdvertisementService
 * @package app\Services
 */
class AdvertisementService extends Service
{
  /**
   * Get all advertisements from the database and fill the model with the data.
   *
   * @return $this
   */
  public function getAllAdvertisement()
  {
    $this->data = [];
    $this->dbManager = Database::getConnection();
    $sql = "SELECT * FROM advertisements";
    $stmt = $this->dbManager->query($sql);

    while($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $model = new Advertisements();
      $model->fillModel($item);
      $this->data[] = $model;
    }

    return $this;
  }

  /**
   * load the user relation to the advertisement data.
   *
   * @return $this
   */
  public function withUser()
  {
    foreach($this->data as $key => $advertisement) {
      $sql = "SELECT * FROM users WHERE id=?";
      $stmt = $this->dbManager->prepare($sql);
      $stmt->execute(array($advertisement->user_id));
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $userModel = new Users();
      $userModel->fillModel($user);
      $this->data[$key]->users = $userModel;
    }

    return $this;
  }
}
