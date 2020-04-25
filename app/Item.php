<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

  protected $fillable = [
      'category', 'foundtime', 'founddate', 'user_id', 'location', 'colour', 'image', 'description'
  ];
}
