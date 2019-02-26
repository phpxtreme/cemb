<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Proveedor;
use App\Repositories\ProveedorGruposRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContratoController extends Controller
{
    public function view(Request $request)
    {
        return View::make('page.contrato.contrato', [
            'proveedores' => $this->getProveedores()
        ]);
    }

    public function getProveedores()
    {
        /** @var Proveedor $model */
        $model = new Proveedor();

        return $model->where(['active' => true])->get();
    }

    public function getProveedorGrupos(Request $request)
    {
        /** @var ProveedorGruposRepository $repository */
        $repository = new ProveedorGruposRepository();

        return $repository->select([
            'active'       => true,
            'proveedor_id' => $request->only('proveedor')
        ])->get(['id', 'name']);
    }
}
