<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CartDetail extends Model
{
    use HasTranslations;

    public $translatable = ['cart_name', 'cart_text', 'short_descript'];

    protected $guarded = [];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/cart_images/' . $this->image);

    } //end of get image path

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function sub_category()
    {

        return $this->belongsTo('App\Models\Sub_Category', 'sub_category_id');

    }

} //end of models
