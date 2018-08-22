<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Casuals',
                'slug' => 'casuals',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Jeans',
                'slug' => 'jeans',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Mens Wear',
                'slug' => 'mens-wear',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Bottom Wear',
                'slug' => 'bottom-wear',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Foot Wear',
                'slug' => 'foot-wear',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Upper Wear',
                'slug' => 'upper-wear',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'T-Shirts',
                'slug' => 't-shirts',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Tracks & Trousers',
                'slug' => 'tracks-trousers',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Formals',
                'slug' => 'formals',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Shirts',
                'slug' => 'shirts',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Electronics',
                'slug' => 'electronics',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Mobiles',
                'slug' => 'mobiles',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Apple',
                'slug' => 'apple',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Samsung',
                'slug' => 'samsung',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Dell',
                'slug' => 'dell',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Toshiba',
                'slug' => 'toshiba',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
        ));
    }
}