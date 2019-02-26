<?php

use App\Models\GrupoItems;
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

                /** @var object $newGroup */
                $newGroup = ProveedorGrupos::create([
                    'name'         => $grupo['name'],
                    'active'       => $grupo['active'],
                    'proveedor_id' => $proveedor->id,
                ]);

                // Associate Items to Group
                if (array_key_exists('items', $grupo)) {
                    foreach ($grupo['items'] as $item) {
                        GrupoItems::create([
                            'grupo_id'    => $newGroup->id,
                            'cantidad'    => $item['cantidad'],
                            'unidad'      => $item['unidad'],
                            'moneda'      => $item['moneda'],
                            'descripcion' => $item['descripcion'],
                            'modelo'      => $item['modelo'],
                            'precio'      => $item['precio'],
                            'active'      => true
                        ]);
                    }
                }
            }
        }, $proveedores);
    }
}
