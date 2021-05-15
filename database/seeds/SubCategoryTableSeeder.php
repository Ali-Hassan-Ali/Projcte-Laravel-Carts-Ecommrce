<?php

use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "1",
            'name'               => ['ar'=> 'قوقل بلي', 'en' => 'Google Play'],
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "1",
            'name' 				 => "ايتونز",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "2",
            'name' 				 => "ابليستشن",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "2",
            'name' 				 => "ستيم",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "3",
            'name' 				 => "شحن سوا",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "3",
            'name' 				 => "شحن زين",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "3",
            'name' 				 => "موبايلي نت",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "3",
            'name' 				 => "كويك نت",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "3",
            'name' 				 => "ليبري نت",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);


        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "4",
            'name' 				 => "امازون",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "4",
            'name' 				 => "مزم",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "4",
            'name' 				 => "بلاش",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "5",
            'name' 				 => "اوبر",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "5",
            'name' 				 => "مرسول",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        $sub_category = \App\Models\Sub_Category::create([
            'user_id' 			 => "1",
            'parent_category_id' => "5",
            'name' 				 => "كامبلي",
            'color_1' 			 => "#dc3545",
            'color_2' 			 => "#401db1",
        ]);

        
    }
}
