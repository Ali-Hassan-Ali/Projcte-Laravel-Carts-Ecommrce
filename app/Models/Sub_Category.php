<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class sub_category extends Model
{
    use HasTranslations;
    
    protected $guarded = [];

    public $translatable = ['name'];

    public function parent_category()
    {
        return $this->belongsTo('App\Models\Parent_Category','parent_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function howuse() 
    {
        return $this->hasMany('App\Models\HowUse','sub_categorys_id');
    }


    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);

    }//end of get image path

}//end of model
