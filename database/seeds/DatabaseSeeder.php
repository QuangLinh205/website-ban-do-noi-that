<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' =>'abc',
                'email' => 'lxc150896@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '111111111',
                'address' => 'viet nam',

            ],
            [
                'name' =>'abc',
                'email' => 'lxc@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '111111111',
                'address' => 'viet nam',
            ],
            [
                'name' =>'abc',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'phone_number' => '111111111',
                'address' => 'viet nam',
            ],
        ];
        DB::table('customers')->insert($data);
    }
}
