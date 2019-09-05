<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ChampSpecifiquesPermissionTableSeeder extends Seeder
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
            ['name' => 'index ChampSpecifique'],
            ['name' => 'index ChampSpecifique']
        );
        Permission::firstOrCreate(
            ['name' => 'edit ChampSpecifique'],
            ['name' => 'edit ChampSpecifique']
        );
        Permission::firstOrCreate(
            ['name' => 'create ChampSpecifique'],
            ['name' => 'create ChampSpecifique']
        );
        Permission::firstOrCreate(
            ['name' => 'store ChampSpecifique'],
            ['name' => 'store ChampSpecifique']
        );
        Permission::firstOrCreate(
            ['name' => 'show ChampSpecifique'],
            ['name' => 'show ChampSpecifique']
        );
        Permission::firstOrCreate(
            ['name' => 'update ChampSpecifique'],
            ['name' => 'update ChampSpecifique']
        );
        Permission::firstOrCreate(
            ['name' => 'delete ChampSpecifique'],
            ['name' => 'delete ChampSpecifique']
        );
    }
}
