<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cupon extends Model
{
  
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function discount($total)
    {
        
            return $this->value;
     
    }
 
}//end of model
