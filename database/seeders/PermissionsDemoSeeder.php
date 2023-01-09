<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::findOrCreate('Admin', 'web');

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $user = User::query()->where('email', 'a@a.com')->first();

        if (empty($user)) {
            $user = \App\Models\User::factory()->create([
                'name' => 'Jasur',
                'email' => 'a@a.com'
            ]);
        }

        $user->assignRole($role);
    }
}
