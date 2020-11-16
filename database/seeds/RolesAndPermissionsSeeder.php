<?php

use Illuminate\Database\Seeder;

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

        // create permissions
        
            Permission::create(['name' => 'create user']);
            Permission::create(['name' => 'edit user']);
            Permission::create(['name' => 'delete user']);

            Permission::create(['name' => 'create medicines']);
            Permission::create(['name' => 'edit medicines']);
            Permission::create(['name' => 'delete medicines']);

            Permission::create(['name' => 'create shipment']);
            Permission::create(['name' => 'edit shipment']);
            Permission::create(['name' => 'delete shipment']);

            Permission::create(['name' => 'create infomation confirm']);
            Permission::create(['name' => 'edit infomation confirm']);
            Permission::create(['name' => 'delete infomation confirm']);

            Permission::create(['name' => 'create domestic shipment']);
            Permission::create(['name' => 'edit domestic shipment']);
            Permission::create(['name' => 'delete domestic shipment']);

            Permission::create(['name' => 'create import shipment']);
            Permission::create(['name' => 'edit import shipment']);
            Permission::create(['name' => 'delete import shipment']);

            Permission::create(['name' => 'create dev shipment']);
            Permission::create(['name' => 'edit dev shipment']);
            Permission::create(['name' => 'delete dev shipment']);

            Permission::create(['name' => 'create add shipment']);
            Permission::create(['name' => 'edit add shipment']);
            Permission::create(['name' => 'delete add shipment']);
      
        // create roles and assign created permissions

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['create medicines','edit medicines','delete medicines']);
        $role = Role::create(['name' => 'writer'])
            ->givePermissionTo(['']);

        $role = Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());
    }
}
