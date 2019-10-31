<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([ChampSpecifiquesPermissionTableSeeder::class]);
        $this->call([DocumentsPermissionTableSeeder::class]);
        $this->call([ProfilesTableSeeder::class]);
        $this->call([RolesTableSeeder::class]);
        $this->call([TypeDocumentsPermissionTableSeeder::class]);
        $this->call([UserRolesTableSeeder::class]);
    }
}
