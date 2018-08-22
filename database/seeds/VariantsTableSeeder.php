<?php

use Illuminate\Database\Seeder;

class VariantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('variants')->delete();
        
        \DB::table('variants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'color' => 'Blue',
                'size' => 42,
                'price' => 1000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'color' => 'Red',
                'size' => 42,
                'price' => 1000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 1,
                'color' => 'Blue',
                'size' => 44,
                'price' => 1200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 1,
                'color' => 'Red',
                'size' => 44,
                'price' => 1200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            4 => 
            array (
                'id' => 5,
                'product_id' => 2,
                'color' => 'White',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            5 => 
            array (
                'id' => 6,
                'product_id' => 2,
                'color' => 'Black',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            6 => 
            array (
                'id' => 7,
                'product_id' => 2,
                'color' => 'White',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            7 => 
            array (
                'id' => 8,
                'product_id' => 2,
                'color' => 'Red',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            8 => 
            array (
                'id' => 9,
                'product_id' => 3,
                'color' => 'Blue',
                'size' => 30,
                'price' => 1200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            9 => 
            array (
                'id' => 10,
                'product_id' => 3,
                'color' => 'Black',
                'size' => 32,
                'price' => 1400,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            10 => 
            array (
                'id' => 11,
                'product_id' => 3,
                'color' => 'Blue',
                'size' => 34,
                'price' => 1400,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            11 => 
            array (
                'id' => 12,
                'product_id' => 3,
                'color' => 'Blue',
                'size' => 36,
                'price' => 1500,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            12 => 
            array (
                'id' => 13,
                'product_id' => 4,
                'color' => 'Blue',
                'size' => 30,
                'price' => 1500,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            13 => 
            array (
                'id' => 14,
                'product_id' => 4,
                'color' => 'Black',
                'size' => 32,
                'price' => 1500,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            14 => 
            array (
                'id' => 15,
                'product_id' => 4,
                'color' => 'White',
                'size' => 34,
                'price' => 1700,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            15 => 
            array (
                'id' => 16,
                'product_id' => 4,
                'color' => 'Black',
                'size' => 36,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            16 => 
            array (
                'id' => 17,
                'product_id' => 5,
                'color' => 'Blue',
                'size' => 42,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            17 => 
            array (
                'id' => 18,
                'product_id' => 5,
                'color' => 'Red',
                'size' => 42,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            18 => 
            array (
                'id' => 19,
                'product_id' => 5,
                'color' => 'White',
                'size' => 44,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            19 => 
            array (
                'id' => 20,
                'product_id' => 5,
                'color' => 'Red',
                'size' => 44,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            20 => 
            array (
                'id' => 21,
                'product_id' => 6,
                'color' => 'White',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            21 => 
            array (
                'id' => 22,
                'product_id' => 6,
                'color' => 'Yellow',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            22 => 
            array (
                'id' => 23,
                'product_id' => 6,
                'color' => 'Green',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            23 => 
            array (
                'id' => 24,
                'product_id' => 6,
                'color' => 'Red',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            24 => 
            array (
                'id' => 25,
                'product_id' => 7,
                'color' => 'Blue',
                'size' => 42,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            25 => 
            array (
                'id' => 26,
                'product_id' => 7,
                'color' => 'Red',
                'size' => 42,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            26 => 
            array (
                'id' => 27,
                'product_id' => 7,
                'color' => 'White',
                'size' => 44,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            27 => 
            array (
                'id' => 28,
                'product_id' => 7,
                'color' => 'Red',
                'size' => 44,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            28 => 
            array (
                'id' => 29,
                'product_id' => 8,
                'color' => 'White',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            29 => 
            array (
                'id' => 30,
                'product_id' => 8,
                'color' => 'Yellow',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            30 => 
            array (
                'id' => 31,
                'product_id' => 8,
                'color' => 'Green',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            31 => 
            array (
                'id' => 32,
                'product_id' => 8,
                'color' => 'Red',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            32 => 
            array (
                'id' => 33,
                'product_id' => 9,
                'color' => 'Black',
                'size' => 42,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            33 => 
            array (
                'id' => 34,
                'product_id' => 9,
                'color' => 'Brown',
                'size' => 42,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            34 => 
            array (
                'id' => 35,
                'product_id' => 9,
                'color' => 'Black',
                'size' => 44,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            35 => 
            array (
                'id' => 36,
                'product_id' => 9,
                'color' => 'Brown',
                'size' => 44,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            36 => 
            array (
                'id' => 37,
                'product_id' => 10,
                'color' => 'Black',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            37 => 
            array (
                'id' => 38,
                'product_id' => 10,
                'color' => 'Brown',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            38 => 
            array (
                'id' => 39,
                'product_id' => 10,
                'color' => 'Black',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            39 => 
            array (
                'id' => 40,
                'product_id' => 10,
                'color' => 'Brown',
                'size' => 44,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            40 => 
            array (
                'id' => 41,
                'product_id' => 11,
                'color' => 'Blue',
                'size' => 42,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            41 => 
            array (
                'id' => 42,
                'product_id' => 11,
                'color' => 'Red',
                'size' => 42,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            42 => 
            array (
                'id' => 43,
                'product_id' => 11,
                'color' => 'Black',
                'size' => 44,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            43 => 
            array (
                'id' => 44,
                'product_id' => 11,
                'color' => 'White',
                'size' => 44,
                'price' => 1800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            44 => 
            array (
                'id' => 45,
                'product_id' => 12,
                'color' => 'Blue',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            45 => 
            array (
                'id' => 46,
                'product_id' => 12,
                'color' => 'Black',
                'size' => 40,
                'price' => 2000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            46 => 
            array (
                'id' => 47,
                'product_id' => 12,
                'color' => 'Red',
                'size' => 38,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            47 => 
            array (
                'id' => 48,
                'product_id' => 12,
                'color' => 'Brown',
                'size' => 38,
                'price' => 2200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            48 => 
            array (
                'id' => 49,
                'product_id' => 13,
                'color' => 'Silver',
                'size' => NULL,
                'price' => 60000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            49 => 
            array (
                'id' => 50,
                'product_id' => 13,
                'color' => 'Golden',
                'size' => NULL,
                'price' => 62000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            50 => 
            array (
                'id' => 51,
                'product_id' => 14,
                'color' => 'Black',
                'size' => NULL,
                'price' => 70000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            51 => 
            array (
                'id' => 52,
                'product_id' => 14,
                'color' => 'Silver',
                'size' => NULL,
                'price' => 72000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            52 => 
            array (
                'id' => 53,
                'product_id' => 15,
                'color' => 'Black',
                'size' => NULL,
                'price' => 50000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            53 => 
            array (
                'id' => 54,
                'product_id' => 15,
                'color' => 'White',
                'size' => NULL,
                'price' => 50000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            54 => 
            array (
                'id' => 55,
                'product_id' => 16,
                'color' => 'Black',
                'size' => NULL,
                'price' => 30000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            55 => 
            array (
                'id' => 56,
                'product_id' => 16,
                'color' => 'White',
                'size' => NULL,
                'price' => 30000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            56 => 
            array (
                'id' => 57,
                'product_id' => 17,
                'color' => 'Black',
                'size' => NULL,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            57 => 
            array (
                'id' => 58,
                'product_id' => 17,
                'color' => 'Red',
                'size' => NULL,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            58 => 
            array (
                'id' => 59,
                'product_id' => 18,
                'color' => 'Black',
                'size' => NULL,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            59 => 
            array (
                'id' => 60,
                'product_id' => 18,
                'color' => 'Red',
                'size' => NULL,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            60 => 
            array (
                'id' => 61,
                'product_id' => 19,
                'color' => 'Black',
                'size' => NULL,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            61 => 
            array (
                'id' => 62,
                'product_id' => 19,
                'color' => 'Red',
                'size' => NULL,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            62 => 
            array (
                'id' => 63,
                'product_id' => 20,
                'color' => 'Black',
                'size' => NULL,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            63 => 
            array (
                'id' => 64,
                'product_id' => 20,
                'color' => 'Red',
                'size' => NULL,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            64 => 
            array (
                'id' => 65,
                'product_id' => 21,
                'color' => 'Black',
                'size' => 44,
                'price' => 3500,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            65 => 
            array (
                'id' => 66,
                'product_id' => 21,
                'color' => 'Blue',
                'size' => 44,
                'price' => 3200,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            66 => 
            array (
                'id' => 67,
                'product_id' => 22,
                'color' => 'Blue',
                'size' => 42,
                'price' => 2800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            67 => 
            array (
                'id' => 68,
                'product_id' => 22,
                'color' => 'Yellow',
                'size' => 42,
                'price' => 2800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            68 => 
            array (
                'id' => 69,
                'product_id' => 23,
                'color' => 'Black',
                'size' => 40,
                'price' => 3500,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            69 => 
            array (
                'id' => 70,
                'product_id' => 23,
                'color' => 'Red',
                'size' => 40,
                'price' => 3500,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            70 => 
            array (
                'id' => 71,
                'product_id' => 24,
                'color' => 'Blue',
                'size' => 30,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            71 => 
            array (
                'id' => 72,
                'product_id' => 24,
                'color' => 'Grey',
                'size' => 30,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            72 => 
            array (
                'id' => 73,
                'product_id' => 25,
                'color' => 'Blue',
                'size' => 32,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            73 => 
            array (
                'id' => 74,
                'product_id' => 25,
                'color' => 'Light Blue',
                'size' => 32,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            74 => 
            array (
                'id' => 75,
                'product_id' => 26,
                'color' => 'Blue',
                'size' => 34,
                'price' => 2600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            75 => 
            array (
                'id' => 76,
                'product_id' => 26,
                'color' => 'Black',
                'size' => 32,
                'price' => 2800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            76 => 
            array (
                'id' => 77,
                'product_id' => 27,
                'color' => 'Blue',
                'size' => 40,
                'price' => 2600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            77 => 
            array (
                'id' => 78,
                'product_id' => 27,
                'color' => 'Black',
                'size' => 42,
                'price' => 2800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            78 => 
            array (
                'id' => 79,
                'product_id' => 28,
                'color' => 'Blue',
                'size' => 44,
                'price' => 2600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            79 => 
            array (
                'id' => 80,
                'product_id' => 28,
                'color' => 'Black',
                'size' => 42,
                'price' => 2800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            80 => 
            array (
                'id' => 81,
                'product_id' => 29,
                'color' => 'Red',
                'size' => 40,
                'price' => 2600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            81 => 
            array (
                'id' => 82,
                'product_id' => 29,
                'color' => 'Red',
                'size' => 44,
                'price' => 2600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            82 => 
            array (
                'id' => 83,
                'product_id' => 30,
                'color' => 'Red',
                'size' => 36,
                'price' => 2600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            83 => 
            array (
                'id' => 84,
                'product_id' => 30,
                'color' => 'Blue',
                'size' => 38,
                'price' => 2900,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            84 => 
            array (
                'id' => 85,
                'product_id' => 31,
                'color' => 'Red',
                'size' => 36,
                'price' => 3800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            85 => 
            array (
                'id' => 86,
                'product_id' => 31,
                'color' => 'Black',
                'size' => 32,
                'price' => 3600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            86 => 
            array (
                'id' => 87,
                'product_id' => 32,
                'color' => 'Red',
                'size' => 30,
                'price' => 2800,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            87 => 
            array (
                'id' => 88,
                'product_id' => 32,
                'color' => 'Blue',
                'size' => 32,
                'price' => 2600,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            88 => 
            array (
                'id' => 89,
                'product_id' => 33,
                'color' => 'Silver',
                'size' => NULL,
                'price' => 35000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            89 => 
            array (
                'id' => 90,
                'product_id' => 33,
                'color' => 'Golden',
                'size' => NULL,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            90 => 
            array (
                'id' => 91,
                'product_id' => 34,
                'color' => 'Silver',
                'size' => NULL,
                'price' => 64000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            91 => 
            array (
                'id' => 92,
                'product_id' => 34,
                'color' => 'Golden',
                'size' => NULL,
                'price' => 66000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            92 => 
            array (
                'id' => 93,
                'product_id' => 35,
                'color' => 'Black',
                'size' => NULL,
                'price' => 78000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            93 => 
            array (
                'id' => 94,
                'product_id' => 35,
                'color' => 'Grey',
                'size' => NULL,
                'price' => 78000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            94 => 
            array (
                'id' => 95,
                'product_id' => 36,
                'color' => 'Black',
                'size' => NULL,
                'price' => 34000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            95 => 
            array (
                'id' => 96,
                'product_id' => 36,
                'color' => 'White',
                'size' => NULL,
                'price' => 34000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            96 => 
            array (
                'id' => 97,
                'product_id' => 37,
                'color' => 'Black',
                'size' => NULL,
                'price' => 25000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            97 => 
            array (
                'id' => 98,
                'product_id' => 37,
                'color' => 'White',
                'size' => NULL,
                'price' => 25000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            98 => 
            array (
                'id' => 99,
                'product_id' => 38,
                'color' => 'Black',
                'size' => NULL,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            99 => 
            array (
                'id' => 100,
                'product_id' => 38,
                'color' => 'White',
                'size' => NULL,
                'price' => 40000,
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
        ));
        
        
    }
}