<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        //Permissions
        //Users
        $userPermissions = [
            'add' => 'add new users',
            'edit' => 'edit users',
            'delete' => 'delete users',
            'list' => 'list users',
        ];

        foreach($userPermissions as $userPermission):
            try {
                Permission::findByName($userPermission);
            } catch (Exception $e) {
                Permission::create(['name' => $userPermission]);
            }
        endforeach;


        //Assigning the Permissions to the Roles
        //Admin Role
        $roleName = 'admin';
        try {
            $role = Role::findByName($roleName);
        } catch (Exception $e) {
            $role = Role::create(['name' => $roleName]);
        }

        //Admin will have all permissions
        //User Permissions To Admin
        $role->givePermissionTo(Permission::all());


        //User Role
        $roleName = 'user';
        try {
            $role = Role::findByName($roleName);
        } catch (Exception $e) {
            $role = Role::create(['name' => $roleName]);
        }

        //Currently No Permission available for user.

    }
}
