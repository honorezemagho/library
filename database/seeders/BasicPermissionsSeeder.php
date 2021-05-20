<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class BasicPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->delete();
        // DB::table('permissions')->delete();
        // DB::table('roles_has_permissions')->delete();


          // Reset cached roles and permissions
          app()[PermissionRegistrar::class]->forgetCachedPermissions();

          // create permissions
          $permission1 = Permission::create(['name' => 'read work']);
          $permission2 = Permission::create(['name' => 'download work']);
          $permission3 = Permission::create(['name' => 'reserve book']);
       
          // create roles and assign existing permissions
          $role1 = Role::create(['name' => 'Admin']);
          $role2 = Role::create(['name' => 'Member']);
          $role3 = Role::create(['name' => 'Student']);
          $role4 = Role::create(['name' => 'Librarian']);
          $role5 = Role::create(['name' => 'Staff']);
          $role6 = Role::create(['name' => 'Lecturer']);

          $role1->givePermissionTo('read work');
          $role1->givePermissionTo('download work');
          $role1->givePermissionTo('reserve book');
          
          $role2->givePermissionTo('read work');
          $role2->givePermissionTo('reserve book');
          
    }
}
