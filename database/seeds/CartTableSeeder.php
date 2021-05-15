<?php

use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markets = \App\Models\Product::create([
            'users_id' 			 => "1",
            'cart_name'   		 => "مويايلي",
            'cart_text'   		 => "اشحن رصيد جوالك في السعودية عبر الإنترنت بإستخدام بطاقات شحن موبايلي المتاحة بالعديد من الفئات المختلفة .",
            'short_descript'     => "حمل ما تريد من ألعاب PC المدفوعة",
        	'sub_category_id'    => "1",
            'market_id'          => "1",
            'rating'             => "5",
            'balance'            => "450",
            'amrecan_price'      => "250",
        ]);

        $markets = \App\Models\Product::create([
            'users_id'           => "1",
            'cart_name'          => "مويايلي",
            'cart_text'          => "اشحن رصيد جوالك في السعودية عبر الإنترنت بإستخدام بطاقات شحن موبايلي المتاحة بالعديد من الفئات المختلفة .",
            'short_descript'     => "حمل ما تريد من ألعاب PC المدفوعة",
            'sub_category_id'    => "1",
            'market_id'          => "1",
            'rating'             => "3",
            'balance'            => "120",
            'amrecan_price'      => "150",
        ]);

        $markets = \App\Models\Product::create([
            'users_id'           => "1",
            'cart_name'          => "مويايلي",
            'cart_text'          => "اشحن رصيد جوالك في السعودية عبر الإنترنت بإستخدام بطاقات شحن موبايلي المتاحة بالعديد من الفئات المختلفة .",
            'short_descript'     => "حمل ما تريد من ألعاب PC المدفوعة",
            'sub_category_id'    => "1",
            'market_id'          => "1",
            'rating'             => "5",
            'balance'            => "800",
            'amrecan_price'      => "240",
        ]);

        $markets = \App\Models\Product::create([
            'users_id'           => "1",
            'cart_name'          => "مويايلي",
            'cart_text'          => "اشحن رصيد جوالك في السعودية عبر الإنترنت بإستخدام بطاقات شحن موبايلي المتاحة بالعديد من الفئات المختلفة .",
            'short_descript'     => "حمل ما تريد من ألعاب PC المدفوعة",
            'sub_category_id'    => "1",
            'market_id'          => "1",
            'rating'             => "2",
            'balance'            => "550",
            'amrecan_price'      => "1200",
        ]);

        $markets = \App\Models\Product::create([
            'users_id'           => "1",
            'cart_name'          => "مويايلي",
            'cart_text'          => "اشحن رصيد جوالك في السعودية عبر الإنترنت بإستخدام بطاقات شحن موبايلي المتاحة بالعديد من الفئات المختلفة .",
            'short_descript'     => "حمل ما تريد من ألعاب PC المدفوعة",
            'sub_category_id'    => "1",
            'market_id'          => "1",
            'rating'             => "4",
            'balance'            => "340",
            'amrecan_price'      => "110",
        ]);

        $markets = \App\Models\Product::create([
            'users_id'           => "1",
            'cart_name'          => "مويايلي",
            'cart_text'          => "اشحن رصيد جوالك في السعودية عبر الإنترنت بإستخدام بطاقات شحن موبايلي المتاحة بالعديد من الفئات المختلفة .",
            'short_descript'     => "حمل ما تريد من ألعاب PC المدفوعة",
            'sub_category_id'    => "1",
            'market_id'          => "1",
            'rating'             => "5",
            'balance'            => "900",
            'amrecan_price'      => "330",
        ]);

        $markets = \App\Models\Product::create([
            'users_id'           => "1",
            'cart_name'          => "مويايلي",
            'cart_text'          => "اشحن رصيد جوالك في السعودية عبر الإنترنت بإستخدام بطاقات شحن موبايلي المتاحة بالعديد من الفئات المختلفة .",
            'short_descript'     => "حمل ما تريد من ألعاب PC المدفوعة",
            'sub_category_id'    => "1",
            'market_id'          => "1",
            'rating'             => "3",
            'balance'            => "1200",
            'amrecan_price'      => "530",
        ]);

    }
}
