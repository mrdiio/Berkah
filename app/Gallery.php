<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    public function filter()
    {
      return $this->belongsTo('App\Filter', 'filter_id', 'id');
    }
}
