<?php

namespace app\Base;

/**
 * Class Request
 * @package app\Base
 */
class Request
{
  /**
   * This function is returning with the requested page path.
   *
   * @return mixed|string
   */
  public function handleRequest()
  {
      $request = $_SERVER['REQUEST_URI'] ?? '/';

      return $request;
  }

  /**
   * This function is returning with the requested method type [GET, POST, etc...].
   *
   * @return mixed
   */
  public function getRequestType()
  {
    return $_SERVER['REQUEST_METHOD'];
  }
}
