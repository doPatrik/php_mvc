<?php

namespace app\Services;

/**
 * Class Service
 * @package app\Services
 *
 * @property array $data
 * @property mixed $dbManager
 */
abstract class Service
{
  protected array $data;
  protected $dbManager;

  /**
   * Get the data as an array.
   *
   * @return array
   */
  public function get()
  {
    return $this->data;
  }
}
