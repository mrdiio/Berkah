<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    public function jenis()
    {
      return $this->belongsTo('App\Type', 'type_id', 'id');
    }
}
