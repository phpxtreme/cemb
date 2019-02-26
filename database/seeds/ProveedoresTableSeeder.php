<?php

use App\Models\ProveedorGrupos;
use App\Repositories\ProveedorRepository;
use Illuminate\Database\Seeder;

class ProveedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param ProveedorRepository $proveedorRepository
     *
     * @return void
     */
    public function run(ProveedorRepository $proveedorRepository)
    {
        /** @var array $proveedores */
        $proveedores = config('init.proveedores');

        array_map(function ($array) use ($proveedorRepository) {

            /** @var array $grupos */
            $grupos = $array['grupos'];

            // Remove elements from the array
            unset($array['grupos']);

            // Create Proveedor
            $proveedor = $proveedorRepository->create($array, true);

            // Associate Grupos
            foreach ($grupos as $grupo) {
                ProveedorGrupos::create([
                    'name'         => $grupo['name'],
                    'active'       => $grupo['active'],
                    'proveedor_id' => $proveedor->id,
                ]);
            }

        }, $proveedores);
    }
}
