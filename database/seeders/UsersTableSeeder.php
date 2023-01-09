<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role_id' => '1'
        ]);

        User::create([
            'name' => 'Employee',
            'email' => 'employee@employee.com',
            'password' => bcrypt('12345678'),
            'role_id' => '2'
        ]);
    }
}
