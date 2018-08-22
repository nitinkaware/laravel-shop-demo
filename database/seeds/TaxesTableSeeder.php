<?php

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('taxes')->delete();
        
        \DB::table('taxes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'VAT',
                'value' => '12.50',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'VAT4',
                'value' => '4.00',
                'created_at' => '2018-08-22 17:32:49',
                'updated_at' => '2018-08-22 17:32:49',
            ),
        ));
        
        
    }
}