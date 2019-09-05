<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DocumentsPermissionTableSeeder extends Seeder
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
            ['name' => 'index document'],
            ['name' => 'index document']
        );
        Permission::firstOrCreate(
            ['name' => 'edit document'],
            ['name' => 'edit document']
        );
        Permission::firstOrCreate(
            ['name' => 'create document'],
            ['name' => 'create document']
        );
        Permission::firstOrCreate(
            ['name' => 'store document'],
            ['name' => 'store document']
        );
        Permission::firstOrCreate(
            ['name' => 'show document'],
            ['name' => 'show document']
        );
        Permission::firstOrCreate(
            ['name' => 'update document'],
            ['name' => 'update document']
        );
        Permission::firstOrCreate(
            ['name' => 'delete document'],
            ['name' => 'delete document']
        );

    }

}
