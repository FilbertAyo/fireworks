<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view_dashboard' => ['admin', 'staff', 'customer'],
            'manage_users' => ['admin'],
            'manage_products' => ['admin'],
            'manage_tasks' => ['admin', 'staff'],
            'manage_payments' => ['admin'],
            'view_assigned_tasks' => ['admin', 'staff'],
        ];

        foreach ($permissions as $permission => $roles) {
            $permissionModel = Permission::updateOrCreate(
                ['name' => $permission],
                ['display_name' => Str::headline($permission)]
            );

            $roleIds = Role::whereIn('name', $roles)->pluck('id');
            $permissionModel->roles()->sync($roleIds);
        }
    }
}

