<?php

namespace app\Base;

/**
 * Class App
 * @package app\Base
 *
 * @property Request $request
 * @property Router $router
 * @property static App $app
 */
class App
{
  public Request $request;
  public Router $router;
  public static App $app;

  public function __construct()
  {
    $this->request = new Request();
    $this->router = new Router($this->request);
    self::$app = $this;
  }

  /**
   * This function is echoing out the hole result, that coming back. In this case a view.
   */
  public function make()
  {
    echo $this->router->handle();
  }
}
