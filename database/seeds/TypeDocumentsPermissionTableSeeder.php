<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TypeDocumentsPermissionTableSeeder extends Seeder
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
            ['name' => 'index Typedocument'],
            ['name' => 'index Typedocument']
        );
        Permission::firstOrCreate(
            ['name' => 'edit Typedocument'],
            ['name' => 'edit Typedocument']
        );
        Permission::firstOrCreate(
            ['name' => 'create Typedocument'],
            ['name' => 'create Typedocument']
        );
        Permission::firstOrCreate(
            ['name' => 'store Typedocument'],
            ['name' => 'store Typedocument']
        );
        Permission::firstOrCreate(
            ['name' => 'show Typedocument'],
            ['name' => 'show Typedocument']
        );
        Permission::firstOrCreate(
            ['name' => 'update Typedocument'],
            ['name' => 'update Typedocument']
        );
        Permission::firstOrCreate(
            ['name' => 'delete Typedocument'],
            ['name' => 'delete Typedocument']
        );

    }
}
