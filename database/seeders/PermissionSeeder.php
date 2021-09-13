<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\SystemAdmin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'view_dashboard',
            'add_dashboard',
            'edit_dashboard',
            'delete_dashboard',
            'activate_dashboard',

            'view_admins',
            'add_admins',
            'edit_admins',
            'delete_admins',
            'activate_admins',


            'view_settings',
            'add_settings',
            'edit_settings',
            'delete_settings',
            'activate_settings',


            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',
            'activate_roles',


            'view_categories',
            'add_categories',
            'edit_categories',
            'delete_categories',
            'activate_categories',


            'view_authors',
            'add_authors',
            'edit_authors',
            'delete_authors',
            'activate_authors',


            'view_books',
            'add_books',
            'edit_books',
            'delete_books',
            'activate_books',

            'view_comments',
            'add_comments',
            'edit_comments',
            'delete_comments',
            'activate_comments',

            'view_users',
            'add_users',
            'edit_users',
            'delete_users',
            'activate_users',


            'view_contacts',
            'add_contacts',
            'edit_contacts',
            'delete_contacts',
            'activate_contacts',


            'view_our_mission',
            'add_our_mission',
            'edit_our_mission',
            'delete_our_mission',
            'activate_our_mission',


            'view_copyrights',
            'add_copyrights',
            'edit_copyrights',
            'delete_copyrights',
            'activate_copyrights',

            'view_publish',
            'add_publish',
            'edit_publish',
            'delete_publish',
            'activate_publish',


            'view_policies',
            'add_policies',
            'edit_policies',
            'delete_policies',
            'activate_policies',

        ];


        foreach ($permissions as $permission) {

            Permission::updateOrCreate([
                'name' => $permission,
                'guard_name' => 'admin'
                ]);
        }

        $role = Role::updateOrCreate(['name' => 'Super Admin', 'guard_name' => 'admin']);

        $permissions = Permission::where('guard_name', 'admin')->pluck('id')->toArray();

        $role->syncPermissions([$permissions]);


        $admin = Admin::create([
            'name' => 'SuperAdmin',
            'email' => 'super_admin@app.com',
            'password' => Hash::make('123456789'),
        ]);

        $admin->assignRole($role);

        /*  $n= Admin::find(1);

          if($n){
          $n->assignRole($role);
          }*/
    }
}
