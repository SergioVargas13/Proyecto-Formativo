<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->name='Super Administrador';
        $role->description=' Super Administrador del Sistema';
        $role->save();


        $role = new Role();
        $role->name='Panadero';
        $role->description='Usuario del Sistema';
        $role->save();

        $role = new Role();
        $role->name='Auxiliar';
        $role->description='Usuario del Sistema';
        $role->save();
    }
}
