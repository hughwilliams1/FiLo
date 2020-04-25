<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{

  protected $fillable = [
      'user_id', 'item_id', 'reason'
  ];

}
