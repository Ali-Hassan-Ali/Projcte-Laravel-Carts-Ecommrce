<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Purchase extends Model
{
    use HasTranslations;

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/pay_currencie/' . $this->image);

    } //end of get image path

    public $translatable = ['cart_name', 'cart_text', 'short_descript'];

    public function sub_category()
    {

        return $this->belongsTo('App\Models\Sub_Category', 'sub_category_id');

    }//end of sub_category

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }//end of users 

}//end of models
