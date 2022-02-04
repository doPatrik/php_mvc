<?php

namespace app\Models;

/**
 * Class Advertisements
 * @package app\Models
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 */
class Advertisements extends Model
{
  public int $id;
  public string $title;
  public int $user_id;
}
