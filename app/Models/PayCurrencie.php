<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayCurrencie extends Model
{
    public $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/PayCurrencie_images/' . $this->image);

    }//end of get image path

}//end of models
