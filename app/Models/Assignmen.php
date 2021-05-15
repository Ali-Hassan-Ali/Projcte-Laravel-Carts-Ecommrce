<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Assignmen extends Model
{
    use HasTranslations;
    
    protected $guarded = [];

    public $translatable = ['Name_Class'];
    
}//end of model
