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
           'name' => 'Kamaleon Arte Decorativo',
           'email' => 'kamaleon.artd@gmail.com',
           'password' => bcrypt('juliankad@ms'),
           'admin' => true
        ]);
    }
}
