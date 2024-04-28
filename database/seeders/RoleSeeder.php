<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::firstOrCreate(['name' => 'Admin']);
        $role_abogado = Role::firstOrCreate(['name' => 'Abogado']);

        Permission::create(['name' => 'Leer casos registrados'  ])->syncRoles([$role_admin]);
        Permission::create(['name' => 'Leer casos asignados'])->syncRoles([$role_abogado]);
        Permission::create(['name' => 'Actualizar casos' ])->syncRoles([$role_admin]);
        Permission::create(['name' => 'Leer Roles' ])->syncRoles([$role_admin]);
        Permission::create(['name' => 'Leer Usuarios'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'Asignar casos'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'Editar casos asignados'])->syncRoles([$role_admin, $role_abogado]);
    }
}
