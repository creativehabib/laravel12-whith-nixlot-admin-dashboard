<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'App Dashboard']);
        Permission::updateOrCreate([
            'name' => 'Access Dashboard',
            'module_id' => $moduleAppDashboard->id,
            'slug' => 'app.dashboard',
        ]);

        $moduleAppRole = Module::updateOrCreate([
            'name' => 'Role Management',
        ]);
        Permission::updateOrCreate([
            'name' => 'Access Role',
            'module_id' => $moduleAppRole->id,
            'slug' => 'app.roles.index',
        ]);
        Permission::updateOrCreate([
            'name' => 'Create Role',
            'module_id' => $moduleAppRole->id,
            'slug' => 'app.roles.create',
        ]);
        Permission::updateOrCreate([
            'name' => 'Edit Role',
            'module_id' => $moduleAppRole->id,
            'slug' => 'app.roles.edit',
        ]);
        Permission::updateOrCreate([
            'name' => 'Delete Role',
            'module_id' => $moduleAppRole->id,
            'slug' => 'app.roles.destroy',
        ]);
        $moduleAppUser = Module::updateOrCreate([
            'name' => 'User Management',
        ]);
        Permission::updateOrCreate([
            'name' => 'Access User',
            'module_id' => $moduleAppUser->id,
            'slug' => 'app.users.index',
        ]);
        Permission::updateOrCreate([
            'name' => 'Create User',
            'module_id' => $moduleAppUser->id,
            'slug' => 'app.users.create',
        ]);
        Permission::updateOrCreate([
            'name' => 'Edit User',
            'module_id' => $moduleAppUser->id,
            'slug' => 'app.users.edit',
        ]);
        Permission::updateOrCreate([
            'name' => 'Delete User',
            'module_id' => $moduleAppUser->id,
            'slug' => 'app.users.destroy',
        ]);

        // Backup & Restore
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Backup & Restore',
        ]);
        Permission::updateOrCreate([
            'name' => 'Access Backup',
            'module_id' => $moduleBackup->id,
            'slug' => 'app.backups.index',
        ]);
        Permission::updateOrCreate([
            'name' => 'Create Backup',
            'module_id' => $moduleBackup->id,
            'slug' => 'app.backups.create',
        ]);
        Permission::updateOrCreate([
            'name' => 'Download Backup',
            'module_id' => $moduleBackup->id,
            'slug' => 'app.backups.download',
        ]);
        Permission::updateOrCreate([
            'name' => 'Delete Backup',
            'module_id' => $moduleBackup->id,
            'slug' => 'app.backups.destroy',
        ]);
    }
}
