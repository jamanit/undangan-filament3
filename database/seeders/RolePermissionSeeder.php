<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RoleSuperAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $RoleAdmin      = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $RoleUser       = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        $permissions = Permission::pluck('name')->toArray();
        $RoleSuperAdmin->syncPermissions($permissions);

        $superadmin = User::find(1);
        if ($superadmin) {
            $superadmin->assignRole('Super Admin');
        }

        $admin = User::find(2);
        if ($admin) {
            $admin->assignRole('admin');
        }
    }
}
