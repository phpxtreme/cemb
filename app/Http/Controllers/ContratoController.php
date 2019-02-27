<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Proveedor;
use App\Repositories\ProveedorGrupoItemsRepository;
use App\Repositories\ProveedorGruposRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContratoController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function view(Request $request)
    {
        return View::make('page.contrato.contrato', [
            'proveedores' => $this->getProveedores()
        ]);
    }

    /**
     * @return mixed
     */
    public function getProveedores()
    {
        /** @var Proveedor $model */
        $model = new Proveedor();

        return $model->where(['active' => true])->get();
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getProveedorGrupos(Request $request)
    {
        /** @var ProveedorGruposRepository $repository */
        $repository = new ProveedorGruposRepository();

        return $repository->select([
            'active'       => true,
            'proveedor_id' => $request->only('proveedor_id')
        ])->get();
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getGrupoItems(Request $request)
    {
        /** @var ProveedorGrupoItemsRepository $repository */
        $repository = new ProveedorGrupoItemsRepository();

        return $repository->select([
            'active'   => true,
            'grupo_id' => $request->only('grupo_id')
        ])->get();
    }

    public function getGrupoDetails(Request $request)
    {
        /** @var ProveedorGruposRepository $repository */
        $repository = new ProveedorGruposRepository();

        /** @var array $data */
        $data = [];

        /** @var integer $grupo */
        $grupo = $request->only('grupo_id');

        $data['proveedor'] = $repository;
    }
}
