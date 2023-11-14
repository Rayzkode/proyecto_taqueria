<?php

namespace Database\Seeders;

use App\Models\Inventario;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Insertar datos en la tabla productos
            Inventario::create([
                'nombre' => 'Producto 1',
                'habia' => 2,
                'entró' => 3,
                'quedó' => 4,
                'gasto' => 5,
                'precio' => 6,
                'fecha' => '2002-10-08',
            ]);

            User::create([
                "nombre" => "Admin",
                "apellido_paterno" => "Doe",
                "apellido_materno" => "Doe",
                "telefono" => "667162616",
                "domicilio" => "sexo",
                "email" => "Admin@email.com",
                "password" => "secret"
            ])->assignRole('admin');

            // TODO: HACER LOS DEMAS SEEDERS 
        
    }
}
