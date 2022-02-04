<?php

namespace app\Controllers;

use app\Base\App;
use app\Services\UserService;

/**
 * Class UserController
 * @package app\Controllers
 */
class UserController
{
  /**
   * Route('/users')
   *
   * @return mixed
   */
  public function index()
  {
    $service = new UserService();
    $data = $service->getAllUser()->get();

    return App::$app->router->renderView('users', $data);
  }
}
