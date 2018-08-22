<?php

use Illuminate\Database\Seeder;

class ProductStatisticsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_statistics')->delete();
        
        \DB::table('product_statistics')->insert(array (
            0 => 
            array (
                'product_id' => 1,
                'view_count' => 56700,
                'order_count' => 5600,
                'shares' => NULL,
            ),
            1 => 
            array (
                'product_id' => 2,
                'view_count' => 60000,
                'order_count' => 4300,
                'shares' => NULL,
            ),
            2 => 
            array (
                'product_id' => 3,
                'view_count' => 74000,
                'order_count' => 2000,
                'shares' => NULL,
            ),
            3 => 
            array (
                'product_id' => 4,
                'view_count' => 12000,
                'order_count' => NULL,
                'shares' => NULL,
            ),
            4 => 
            array (
                'product_id' => 5,
                'view_count' => 66000,
                'order_count' => NULL,
                'shares' => NULL,
            ),
            5 => 
            array (
                'product_id' => 6,
                'view_count' => 23456,
                'order_count' => NULL,
                'shares' => NULL,
            ),
            6 => 
            array (
                'product_id' => 7,
                'view_count' => 65783,
                'order_count' => NULL,
                'shares' => NULL,
            ),
            7 => 
            array (
                'product_id' => 8,
                'view_count' => 23456,
                'order_count' => 9873,
                'shares' => NULL,
            ),
            8 => 
            array (
                'product_id' => 9,
                'view_count' => 78965,
                'order_count' => NULL,
                'shares' => NULL,
            ),
            9 => 
            array (
                'product_id' => 10,
                'view_count' => 23456,
                'order_count' => 2354,
                'shares' => 1800,
            ),
            10 => 
            array (
                'product_id' => 11,
                'view_count' => 65784,
                'order_count' => 9786,
                'shares' => 2600,
            ),
            11 => 
            array (
                'product_id' => 12,
                'view_count' => 34756,
                'order_count' => 9876,
                'shares' => 3245,
            ),
            12 => 
            array (
                'product_id' => 13,
                'view_count' => 67543,
                'order_count' => 7869,
                'shares' => NULL,
            ),
            13 => 
            array (
                'product_id' => 14,
                'view_count' => 20000,
                'order_count' => 4359,
                'shares' => NULL,
            ),
            14 => 
            array (
                'product_id' => 15,
                'view_count' => 35000,
                'order_count' => 5690,
                'shares' => NULL,
            ),
            15 => 
            array (
                'product_id' => 16,
                'view_count' => 22000,
                'order_count' => 7690,
                'shares' => 2346,
            ),
            16 => 
            array (
                'product_id' => 17,
                'view_count' => 21000,
                'order_count' => NULL,
                'shares' => NULL,
            ),
            17 => 
            array (
                'product_id' => 18,
                'view_count' => 28000,
                'order_count' => 5467,
                'shares' => 4316,
            ),
            18 => 
            array (
                'product_id' => 19,
                'view_count' => 87694,
                'order_count' => 2365,
                'shares' => NULL,
            ),
            19 => 
            array (
                'product_id' => 20,
                'view_count' => 78645,
                'order_count' => 8769,
                'shares' => NULL,
            ),
            20 => 
            array (
                'product_id' => 21,
                'view_count' => 54673,
                'order_count' => 3567,
                'shares' => 7654,
            ),
            21 => 
            array (
                'product_id' => 22,
                'view_count' => 76894,
                'order_count' => 3457,
                'shares' => NULL,
            ),
            22 => 
            array (
                'product_id' => 23,
                'view_count' => 34567,
                'order_count' => 8769,
                'shares' => 8769,
            ),
            23 => 
            array (
                'product_id' => 24,
                'view_count' => 23456,
                'order_count' => 2345,
                'shares' => 8654,
            ),
            24 => 
            array (
                'product_id' => 25,
                'view_count' => 54678,
                'order_count' => 9872,
                'shares' => NULL,
            ),
            25 => 
            array (
                'product_id' => 38,
                'view_count' => NULL,
                'order_count' => 3456,
                'shares' => NULL,
            ),
            26 => 
            array (
                'product_id' => 37,
                'view_count' => NULL,
                'order_count' => 6543,
                'shares' => NULL,
            ),
            27 => 
            array (
                'product_id' => 36,
                'view_count' => NULL,
                'order_count' => 4312,
                'shares' => NULL,
            ),
            28 => 
            array (
                'product_id' => 35,
                'view_count' => NULL,
                'order_count' => 2309,
                'shares' => NULL,
            ),
            29 => 
            array (
                'product_id' => 34,
                'view_count' => NULL,
                'order_count' => 1346,
                'shares' => NULL,
            ),
            30 => 
            array (
                'product_id' => 33,
                'view_count' => NULL,
                'order_count' => 3456,
                'shares' => NULL,
            ),
            31 => 
            array (
                'product_id' => 32,
                'view_count' => NULL,
                'order_count' => 1890,
                'shares' => NULL,
            ),
            32 => 
            array (
                'product_id' => 31,
                'view_count' => NULL,
                'order_count' => 9876,
                'shares' => 2345,
            ),
            33 => 
            array (
                'product_id' => 30,
                'view_count' => NULL,
                'order_count' => 3455,
                'shares' => NULL,
            ),
            34 => 
            array (
                'product_id' => 29,
                'view_count' => NULL,
                'order_count' => 3456,
                'shares' => NULL,
            ),
            35 => 
            array (
                'product_id' => 28,
                'view_count' => NULL,
                'order_count' => 6754,
                'shares' => NULL,
            ),
            36 => 
            array (
                'product_id' => 27,
                'view_count' => NULL,
                'order_count' => 5467,
                'shares' => 5670,
            ),
            37 => 
            array (
                'product_id' => 26,
                'view_count' => NULL,
                'order_count' => 7645,
                'shares' => NULL,
            ),
        ));
        
        
    }
}