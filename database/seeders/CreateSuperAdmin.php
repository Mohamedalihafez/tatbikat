<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::create([
            "name" => "Super Admin",
            "username" => "SuperAdmin",
            "email" => "super_admin@onfire.tutbekat.com",
            "email_verified_at" => now(),
            "password" => Hash::make("super_admin_password!"),
        ]);

        $superAdmin->attachRole("superAdmin");
    }
}