<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_categories')->delete();
        
        \DB::table('sub_categories')->insert(array (
            0 => 
            array (
                'category_id' => 3,
                'sub_category_id' => 4,
            ),
            1 => 
            array (
                'category_id' => 3,
                'sub_category_id' => 5,
            ),
            2 => 
            array (
                'category_id' => 3,
                'sub_category_id' => 6,
            ),
            3 => 
            array (
                'category_id' => 4,
                'sub_category_id' => 2,
            ),
            4 => 
            array (
                'category_id' => 4,
                'sub_category_id' => 8,
            ),
            5 => 
            array (
                'category_id' => 5,
                'sub_category_id' => 1,
            ),
            6 => 
            array (
                'category_id' => 5,
                'sub_category_id' => 9,
            ),
            7 => 
            array (
                'category_id' => 6,
                'sub_category_id' => 7,
            ),
            8 => 
            array (
                'category_id' => 6,
                'sub_category_id' => 10,
            ),
            9 => 
            array (
                'category_id' => 11,
                'sub_category_id' => 12,
            ),
            10 => 
            array (
                'category_id' => 11,
                'sub_category_id' => 13,
            ),
            11 => 
            array (
                'category_id' => 12,
                'sub_category_id' => 14,
            ),
            12 => 
            array (
                'category_id' => 12,
                'sub_category_id' => 15,
            ),
            13 => 
            array (
                'category_id' => 13,
                'sub_category_id' => 16,
            ),
            14 => 
            array (
                'category_id' => 13,
                'sub_category_id' => 17,
            ),
        ));
        
        
    }
}