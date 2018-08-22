<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 =>
                [
                    'id'             => 1,
                    'name'           => 'Nitin Kaware',
                    'email'          => 'nitin.kaware1@gmail.com',
                    'password'       => '$2y$10$wD.zIucZSYYykweuxwFJW.o2PPN5SLP7YKhfrmP4zzwVTQ9RgoR1S',
                    'remember_token' => null,
                    'created_at'     => '2018-08-22 17:40:33',
                    'updated_at'     => '2018-08-22 17:40:33',
                ],
        ]);
    }
}