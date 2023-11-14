<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleMesero = Role::create(['name' => 'mesero']);
        $roleCocinero = Role::create(['name' => 'cocinero']);

        /*
        TODO: AGREGAR LOS PERMISOS DE LOS USUARIOS
        */

        Permission::create(['name' => 'admin.index'])->syncRoles($roleAdmin);
        Permission::create(['name' => 'register'])->syncRoles($roleAdmin);
    }
}
