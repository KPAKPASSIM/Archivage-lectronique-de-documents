<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
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
            ['name' => 'index role'],
            ['name' => 'index role']
        );
        Permission::firstOrCreate(
            ['name' => 'edit role'],
            ['name' => 'edit role']
        );
        Permission::firstOrCreate(
            ['name' => 'create role'],
            ['name' => 'create role']
        );
        Permission::firstOrCreate(
            ['name' => 'store role'],
            ['name' => 'store role']
        );
        Permission::firstOrCreate(
            ['name' => 'show role'],
            ['name' => 'show role']
        );
        Permission::firstOrCreate(
            ['name' => 'update role'],
            ['name' => 'update role']
        );
        Permission::firstOrCreate(
            ['name' => 'delete role'],
            ['name' => 'delete role']
        );
     
    }
}
