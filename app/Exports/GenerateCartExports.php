<?php
namespace App\Exports;

use App\Models\GenerateCart;
use Carbon\Carbon;


use Maatwebsite\Excel\Concerns\FromCollection;

class GenerateCartExports implements FromCollection
{

  
    public function collection()
    {

      $all_carts = GenerateCart::get();

      	return GenerateCart::where('used',null)->select('cart_name->en','cart_code','ended_cart_time')->get();      
    }
}

