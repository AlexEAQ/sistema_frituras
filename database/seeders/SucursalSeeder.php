<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Sucursal::create([

            'nombre_sucursal' => 'SUCURSAL PRINCIPAL',
            'direccion' => 'Calle San Antonio',


        ]);


    }
}
