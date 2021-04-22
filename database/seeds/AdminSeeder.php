<?php

use Illuminate\Database\Seeder;
use App\Model\Admin;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'gender' => 'male',
            'role' => '1'
        ]);
    }
}
