<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create user
        User::factory(10)->create();

        // create roles
        Role::factory(6)->create();

        // create permissions
        Permission::factory(10)->create();

        // create role_permission
        $roles = Role::all();
        $permissions = Permission::all();
        foreach ($roles as $role) {
            $role->permissions()->attach($permissions->random(3));
        }

        // create user_role
        $users = User::all();
        foreach ($users as $user) {
            $user->roles()->attach($roles->random(2));
        }
    }
}
