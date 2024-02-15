<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superAdmin = Role::create(['name' => 'Super Administrator']);
        $role_admin = Role::create(['name' => 'Administrator']);
        $role_usuRegu = Role::create(['name' => 'Regular User']);

        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);


        $permissions_superAdmin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role
        ];

        $permissions_admin = [
            $permission_read_role,
            $permission_update_role
        ];

        $permissions_usuRegu = [$permission_read_role];

        $role_superAdmin->syncPermissions($permissions_superAdmin);
        $role_admin->syncPermissions($permissions_admin);
        $role_usuRegu->syncPermissions($permissions_usuRegu);
    }
}
