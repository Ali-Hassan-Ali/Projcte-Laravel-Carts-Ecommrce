<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CartStore extends Model
{
	use HasTranslations;
	
    protected $guarded = [];

    protected $table = 'cart_stores';

    public $translatable = ['cart_name'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','users_id');
    }

    public function sub_category() {

	    return $this->belongsTo('App\Models\Sub_Category','sub_category_id');

   	}

    public function cart()
    {
        return $this->belongsTo('App\Models\Product','products_id');
    }
    
}//end of models
