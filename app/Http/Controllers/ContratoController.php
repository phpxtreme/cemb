<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Proveedor;
use App\Models\ProveedorGrupos;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;

class ContratoController extends Controller
{
    public function view(Request $request)
    {
        return View::make('page.contrato.contrato', [
            'grupos'      => $this->getGrupos(),
            'proveedores' => $this->getProveedores()
        ]);
    }

    public function getGrupos()
    {
        /** @var ProveedorGrupos $model */
        $model = new ProveedorGrupos();

        return $model->where(['active' => true])->get();
    }

    public function getProveedores()
    {
        /** @var Proveedor $model */
        $model = new Proveedor();

        return $model->where(['active' => true])->get();
    }
}
