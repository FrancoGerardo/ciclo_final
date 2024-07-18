<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notaingreso = New Proveedor();
        $notaingreso->id = 1;
        $notaingreso->nombre = "SERGIO TOPOYIYO";
        $notaingreso->email = "SERGIO TOPOYIYO";
        $notaingreso->telefono = "79033966";
        $notaingreso->direccion = "Barrio lujan";
        $notaingreso->save();

        $notaingreso = New Proveedor();
        $notaingreso->id = 2;
        $notaingreso->nombre = "TOMBO POLLO";
        $notaingreso->email = "mollito_TU_TERROR@gmail.com";
        $notaingreso->telefono = "79033148";
        $notaingreso->direccion = "Barrio siempre viva123";
        $notaingreso->save();

        $notaingreso = New Proveedor();
        $notaingreso->id = 3;
        $notaingreso->nombre = "Casera Meche";
        $notaingreso->email = "tuCaserita@gamil.com";
        $notaingreso->telefono = "79033966";
        $notaingreso->direccion = "Calle mechero";
        $notaingreso->save();

        $notaingreso = New Proveedor();
        $notaingreso->id = 4;
        $notaingreso->nombre = "Wacho Licores";
        $notaingreso->email = "elLicores@gmail.com";
        $notaingreso->telefono = "79033966";
        $notaingreso->direccion = "barrio plan3k";
        $notaingreso->save();

        $notaingreso = New Proveedor();
        $notaingreso->id = 5;
        $notaingreso->nombre = "Casera Los Pozos ";
        $notaingreso->email = "lospozps@gmail.com";
        $notaingreso->telefono = "79033966";
        $notaingreso->direccion = "los pozos caseta 15";
        $notaingreso->save();

        $notaingreso = New Proveedor();
        $notaingreso->id = 6;
        $notaingreso->nombre = "Casera La Ramada";
        $notaingreso->email = "comercialLosangeles@gmail.com";
        $notaingreso->telefono = "79033966";
        $notaingreso->direccion = "centro comercial los angeles zona antigua ramada";
        $notaingreso->save();
    }
}
