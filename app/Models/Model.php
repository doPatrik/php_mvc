<?php

namespace app\Models;

/**
 * Class Model
 * @package app\Models
 */
abstract class Model
{
  /**
   * This function is check the parameter array, that the property is exists in the own model,
   * then fill with the value.
   *
   * @param $data
   */
  public function fillModel($data)
  {
    foreach($data as $key => $value) {
      if(property_exists($this, $key)) {
        $this->$key = $value;
      }
    }
  }
}
