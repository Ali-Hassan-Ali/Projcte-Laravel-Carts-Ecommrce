<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class parent_category extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = ['name'];

    public function sub_category()
    {
        return $this->hasMany('App\Models\Sub_Category','parent_category_id');
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/parent_category_images/' . $this->image);

    }//end of get image path

}//end of model
