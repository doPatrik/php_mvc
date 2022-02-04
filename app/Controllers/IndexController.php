<?php

namespace app\Controllers;

use app\Base\App;

/**
 * Class IndexController
 * @package app\Controllers
 */
class IndexController
{
  /**
   * Route('/')
   *
   * @return mixed
   */
  public function index()
  {
    return App::$app->router->renderView('dashboard');
  }
}
