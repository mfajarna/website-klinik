<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@admin.com',
                'password'  => Hash::make('superadmin123'),
                'role'  => 'superadmin'
            ]
        ];


        User::insert($data);
    }
}
