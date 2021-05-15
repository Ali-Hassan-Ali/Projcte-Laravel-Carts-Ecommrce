<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\bcrypt;
use Illuminate\Notifications\Notifiable;

class Cliant extends Authenticatable
{


    use Notifiable;    

    // protected $guard = 'admin';
    
    protected $fillable = [
        'name', 
        'stars',
        'email', 
        'password',
        'image',
        'code_phone',
        'code_email',
        'emailVerified',
        
        'phone_number', 
        'isVerified',
        
        'provider',
        'provider_id',

        'code_cart_phone',
        'code_cart_email',
        'news_message',
        'holiday_message',
        'monthly_message',
        
        'assignment_link',
        'account_balance',
        'occastion_Status',
        'smart_email'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/user_images/' . $this->image);

    }//end of get image path

    public function ticit()
    {
        return $this->hasMany('App\Models\SupportCart');
    }


    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }


    
}//end of model
