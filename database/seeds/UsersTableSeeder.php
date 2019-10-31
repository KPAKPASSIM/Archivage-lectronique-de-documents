<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
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
            ['name' => 'index utilisateur'],
            ['name' => 'index utilisateur']
        );
        Permission::firstOrCreate(
            ['name' => 'edit utilisateur'],
            ['name' => 'edit utilisateur']
        );
        Permission::firstOrCreate(
            ['name' => 'create utilisateur'],
            ['name' => 'create utilisateur']
        );
        Permission::firstOrCreate(
            ['name' => 'store utilisateur'],
            ['name' => 'store utilisateur']
        );
        Permission::firstOrCreate(
            ['name' => 'show utilisateur'],
            ['name' => 'show utilisateur']
        );
        Permission::firstOrCreate(
            ['name' => 'update utilisateur'],
            ['name' => 'update utilisateur']
        );
        Permission::firstOrCreate(
            ['name' => 'delete utilisateur'],
            ['name' => 'delete utilisateur']
        );

         DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
