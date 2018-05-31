<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'password' => bcrypt('adminadmin11'),
            'email' => 'admin@admin.com',
            'name' => 'admin',
        ]);
    }
}
