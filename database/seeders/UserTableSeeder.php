<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            User::create([
                'first_name'          => 'Super',
                'last_name'          => 'Admin',
                'email'          => 'superadmin@gmail.com',
                'phone'        => '03057301880',
                'password'   => bcrypt('12345678'),
                'role'           => 0,
            ]);

            User::create([
                'first_name'          => 'Company',
                'last_name'          => 'Admin',
                'email'          => 'company@gmail.com',
                'phone'        => '03108978978',
                'password'   => bcrypt('12345678'),
                'role'           => 1,
            ]);

    }
}
