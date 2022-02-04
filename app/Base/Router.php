<?php

namespace app\Base;

/**
 * This class is process the requested path and execute the callback function.
 * If a callback type is string, then return with the right view.
 *
 * Class Router
 * @package app\Base
 *
 * @property Request $request
 * @property array $routes
 */
class Router
{
  public Request $request;

  protected array $routes;

  public function __construct(Request $request)
  {
    $this->request = $request;
    $this->routes = [];
  }

  /**
   * This function is store the specified GET routes with their own callback in an array.
   *
   * @param string $route
   * @param $callback
   */
  public function get(string $route, $callback)
  {
    $this->routes['GET'][$route] = $callback;
  }

  /**
   * This function is store the specified POST routes with their own callback in an array.
   *
   * @param string $route
   * @param $callback
   */
  public function post(string $route, $callback)
  {
    $this->routes['POST'][$route] = $callback;
  }

  /**
   * This function is handle the hole request, process them and return with the right view,
   * or execute the callback function
   *
   * @return mixed|void
   */
  public function handle()
  {
    $route = $this->request->handleRequest();
    $requestType = $this->request->getRequestType();

    $callback = $this->routes[$requestType][$route] ?? false;

    //If the route not exist in the index.php, then return with error404 view.
    if($callback === false) {
      return $this->render404();
    }

    /* If we specified only a string instead of a callback,
    *  then render out the view with the name of the string.
    */
    if(is_string($callback)) {
      return $this->renderView($callback);
    }

    return call_user_func($callback);
  }

  /**
   * This function is load the basic layout, that contains a {{main}} string,
   * and replace this string with the extended view.
   *
   * @param string $viewName
   * @param array|null $viewData
   * @return mixed
   */
  public function renderView(string $viewName, ?array $viewData = [])
  {
    $layout = $this->loadLayoutView();
    $view = $this->loadView($viewName, $viewData);
    return str_replace("{{main}}", $view, $layout);
  }

  /**
   * This function is include the basic layout file, but not send to the output,
   * insteadof store in a buffer, and return as a string
   *
   * @return false|string
   */
  public function loadLayoutView()
  {
    ob_start();
    include_once SERVER_ROOT . "/resources/views/layouts/layout.php";
    return ob_get_clean();
  }

  /**
   * @param string $viewName
   * @param $viewData
   * @return false|string
   */
  public function loadView(string $viewName, $viewData)
  {
    ob_start();
    include_once SERVER_ROOT . "/resources/views/$viewName.php";
    return ob_get_clean();
  }

  public function render404()
  {
    include_once SERVER_ROOT . "/resources/views/error404.php";
  }
}
