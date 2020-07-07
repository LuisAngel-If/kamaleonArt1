<?php

use Illuminate\Database\Seeder;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed
        User::create([
           'name' => 'LAIF',
           'email' => 'ykrad1701@gmail.com',
           'password' => bcrypt('123123'),
           'admin' => true
        ]);
    }
}
