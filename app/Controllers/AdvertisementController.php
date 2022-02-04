<?php

namespace app\Controllers;

use app\Base\App;
use app\Services\AdvertisementService;

/**
 * Class AdvertisementController
 * @package app\Controllers
 */
class AdvertisementController
{
  /**
   * Route('/advertisements')
   *
   * @return mixed
   */
  public function index()
  {
    $service = new AdvertisementService();
    $data = $service->getAllAdvertisement()->withUser()->get();

    return App::$app->router->renderView('advertisements', $data);
  }
}
