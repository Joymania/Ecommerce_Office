<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'rakibul',
            'email' => 'mdrakibul373@gmail.com',
            'password' => bcrypt('123456'),
            'gender' => 'male',
            'address' => Str::random(10)
        ]);
    }
}
