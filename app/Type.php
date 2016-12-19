<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //Model For Property Types
    protected $table = 'property_types';

    public function properties()
    {
      return $this->hasMany('App\Property');
    }
}
