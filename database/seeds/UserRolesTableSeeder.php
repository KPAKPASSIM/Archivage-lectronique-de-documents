<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::firstOrCreate(
            ['name' => 'index userRole'],
            ['name' => 'index userRole']
        );
        Permission::firstOrCreate(
            ['name' => 'edit userRole'],
            ['name' => 'edit userRole']
        );
        Permission::firstOrCreate(
            ['name' => 'create userRole'],
            ['name' => 'create userRole']
        );
        Permission::firstOrCreate(
            ['name' => 'store userRole'],
            ['name' => 'store userRole']
        );
        Permission::firstOrCreate(
            ['name' => 'show userRole'],
            ['name' => 'show userRole']
        );
        Permission::firstOrCreate(
            ['name' => 'update userRole'],
            ['name' => 'update userRole']
        );
        Permission::firstOrCreate(
            ['name' => 'delete userRole'],
            ['name' => 'delete userRole']
        );
    }
}
