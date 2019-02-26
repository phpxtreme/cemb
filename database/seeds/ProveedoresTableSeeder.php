<?php

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var array $proveedores */
        $proveedores = config('init.proveedores');

        array_map(function ($proveedor) {
            Proveedor::create([
                'name'   => $proveedor['name'],
                'active' => $proveedor['active'],
            ]);
        }, $proveedores);
    }
}
