<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::all();
        Role::updateOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
            'deletable' => false,
        ])->permissions()->sync($adminPermissions->pluck('id'));

        Role::updateOrCreate([
            'name' => 'User',
            'slug' => 'user',
            'deletable' => false,
        ]);
    }
}
