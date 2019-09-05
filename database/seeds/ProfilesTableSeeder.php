<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ProfilesTableSeeder extends Seeder
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
            ['name' => 'edit profile'],
            ['name' => 'edit profile']
        );

        Permission::firstOrCreate(
            ['name' => 'update profile'],
            ['name' => 'update profile']
        );
        Permission::firstOrCreate(
            ['name' => 'password profile'],
            ['name' => 'password profile']
        );
    }
}
