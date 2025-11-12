<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@kenseep.com'],
            [
                'name' => 'Kenseep Admin',
                'phone' => '+255710000001',
                'user_status' => 'active',
                'password' => Hash::make('password'),
            ]
        );
        $admin->syncRoles(['admin']);

        $staff = User::updateOrCreate(
            ['email' => 'expert@kenseep.com'],
            [
                'name' => 'Kenseep Expert',
                'phone' => '+255710000002',
                'user_status' => 'active',
                'password' => Hash::make('password'),
            ]
        );
        $staff->syncRoles(['staff']);

        $customer = User::updateOrCreate(
            ['email' => 'customer@kenseep.com'],
            [
                'name' => 'Kenseep Customer',
                'phone' => '+255710000003',
                'user_status' => 'active',
                'password' => Hash::make('password'),
            ]
        );
        $customer->syncRoles(['customer']);
    }
}

