<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AbouUs extends Model
{
	use HasTranslations;

    protected $guarded = [];

    public $translatable = ['text'];

}//end of model
