<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'tax_id' => 1,
                'name' => 'Nike Sneakers',
                'created_at' => '2016-12-09 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 1,
                'tax_id' => 2,
                'name' => 'Adidas Running Shoes',
                'created_at' => '2016-11-05 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            2 => 
            array (
                'id' => 3,
                'category_id' => 2,
                'tax_id' => 1,
                'name' => 'Spykar Denim',
                'created_at' => '2017-01-05 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            3 => 
            array (
                'id' => 4,
                'category_id' => 2,
                'tax_id' => 2,
                'name' => 'Lee Cotton Jeans',
                'created_at' => '2017-01-25 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            4 => 
            array (
                'id' => 5,
                'category_id' => 7,
                'tax_id' => 1,
                'name' => 'Polo Collar T-Shirt',
                'created_at' => '2016-12-20 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            5 => 
            array (
                'id' => 6,
                'category_id' => 7,
                'tax_id' => 2,
                'name' => 'Adidas Nylon',
                'created_at' => '2017-01-28 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            6 => 
            array (
                'id' => 7,
                'category_id' => 8,
                'tax_id' => 1,
                'name' => 'Comfort Tracks',
                'created_at' => '2016-12-22 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            7 => 
            array (
                'id' => 8,
                'category_id' => 8,
                'tax_id' => 2,
                'name' => 'Adidas Trousers',
                'created_at' => '2017-01-20 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            8 => 
            array (
                'id' => 9,
                'category_id' => 9,
                'tax_id' => 1,
                'name' => 'Bata Lace up Shoes',
                'created_at' => '2016-12-22 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            9 => 
            array (
                'id' => 10,
                'category_id' => 9,
                'tax_id' => 2,
                'name' => 'Franco Leather',
                'created_at' => '2017-01-20 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            10 => 
            array (
                'id' => 11,
                'category_id' => 10,
                'tax_id' => 1,
                'name' => 'Wrangler Checked Shirt',
                'created_at' => '2017-01-22 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            11 => 
            array (
                'id' => 12,
                'category_id' => 10,
                'tax_id' => 2,
                'name' => 'Printed Shirt',
                'created_at' => '2017-01-20 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            12 => 
            array (
                'id' => 13,
                'category_id' => 14,
                'tax_id' => 1,
                'name' => 'Iphone 6S',
                'created_at' => '2017-01-10 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            13 => 
            array (
                'id' => 14,
                'category_id' => 14,
                'tax_id' => 2,
                'name' => 'Iphone 7',
                'created_at' => '2016-12-20 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            14 => 
            array (
                'id' => 15,
                'category_id' => 15,
                'tax_id' => 1,
                'name' => 'Galaxy S7 Edge',
                'created_at' => '2017-01-15 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            15 => 
            array (
                'id' => 16,
                'category_id' => 15,
                'tax_id' => 2,
                'name' => 'Galaxy J5',
                'created_at' => '2016-12-20 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            16 => 
            array (
                'id' => 17,
                'category_id' => 16,
                'tax_id' => 1,
                'name' => 'Dell Inspiron Core',
                'created_at' => '2017-01-10 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            17 => 
            array (
                'id' => 18,
                'category_id' => 16,
                'tax_id' => 2,
                'name' => 'Dell Inspiron 11',
                'created_at' => '2016-12-20 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            18 => 
            array (
                'id' => 19,
                'category_id' => 17,
                'tax_id' => 1,
                'name' => 'Satellite Pro',
                'created_at' => '2017-01-15 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            19 => 
            array (
                'id' => 20,
                'category_id' => 17,
                'tax_id' => 2,
                'name' => 'Satellite P50',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            20 => 
            array (
                'id' => 21,
                'category_id' => 1,
                'tax_id' => 2,
                'name' => 'Roadster Loafers',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            21 => 
            array (
                'id' => 22,
                'category_id' => 1,
                'tax_id' => 2,
                'name' => 'Light Loafers',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            22 => 
            array (
                'id' => 23,
                'category_id' => 1,
                'tax_id' => 2,
                'name' => 'Floaters',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            23 => 
            array (
                'id' => 24,
                'category_id' => 2,
                'tax_id' => 2,
                'name' => 'Denim Wash',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            24 => 
            array (
                'id' => 25,
                'category_id' => 2,
                'tax_id' => 2,
                'name' => 'Pepe Jeans Slim Fit',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            25 => 
            array (
                'id' => 26,
                'category_id' => 2,
                'tax_id' => 2,
                'name' => 'Spykar Funky Regular',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            26 => 
            array (
                'id' => 27,
                'category_id' => 7,
                'tax_id' => 2,
                'name' => 'Being Human Collar T-shirt',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            27 => 
            array (
                'id' => 28,
                'category_id' => 7,
                'tax_id' => 2,
                'name' => 'V - Neck Smart T-Shirt',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            28 => 
            array (
                'id' => 29,
                'category_id' => 7,
                'tax_id' => 2,
                'name' => 'Manchester United',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            29 => 
            array (
                'id' => 30,
                'category_id' => 8,
                'tax_id' => 2,
                'name' => 'Superdry track',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            30 => 
            array (
                'id' => 31,
                'category_id' => 8,
                'tax_id' => 2,
                'name' => 'Night Comfy Track',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            31 => 
            array (
                'id' => 32,
                'category_id' => 8,
                'tax_id' => 2,
                'name' => 'Superdry Joggers',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            32 => 
            array (
                'id' => 33,
                'category_id' => 14,
                'tax_id' => 2,
                'name' => 'Iphone 6',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            33 => 
            array (
                'id' => 34,
                'category_id' => 14,
                'tax_id' => 2,
                'name' => 'Iphone 6s Plus',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            34 => 
            array (
                'id' => 35,
                'category_id' => 14,
                'tax_id' => 2,
                'name' => 'Iphone 7 Plus',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            35 => 
            array (
                'id' => 36,
                'category_id' => 15,
                'tax_id' => 2,
                'name' => 'Galaxy J7',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            36 => 
            array (
                'id' => 37,
                'category_id' => 15,
                'tax_id' => 2,
                'name' => 'Galaxy Grand Prime',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            37 => 
            array (
                'id' => 38,
                'category_id' => 15,
                'tax_id' => 2,
                'name' => 'Note 4',
                'created_at' => '2016-01-18 11:16:11',
                'updated_at' => '2018-08-22 17:32:49',
            ),
        ));
        
        
    }
}