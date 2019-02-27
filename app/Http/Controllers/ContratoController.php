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

    public function getGrupoDetalles(Request $request)
    {
        /** @var ProveedorGruposRepository $grupoRepository */
        $grupoRepository = new ProveedorGruposRepository();

        /** @var ProveedorGrupoItemsRepository $itemsRepository */
        $itemsRepository = new ProveedorGrupoItemsRepository();

        /** @var array $data */
        $data = [];

        /** @var integer $grupo */
        $grupo_id = $request->only('grupo_id');

        if ($grupoRepository->select(['id' => $grupo_id], true)) {

            /** @var object $grupo */
            $grupo = $grupoRepository->select(['id' => $grupo_id])
                ->with(['proveedor', 'items'])->get();

            /** @var object $items */
            $items = $itemsRepository->select(['grupo_id' => $grupo_id])
                ->with(['grupo']);

            $data['grupo']     = $grupo->first()->name;
            $data['proveedor'] = $grupo->first()->proveedor->name;
            $data['total']     = collect($grupo->first()->items)->count();
            $data['precio']    = collect($grupo->first()->items)->sum('precio');
            $data['unidades']  = collect($items->get()->pluck('unidad'))->unique()->values();
            $data['monedas']   = collect($items->get()->pluck('moneda'))->unique()->values();

            // Cantidades
            $data['menorCantidad'] = $itemsRepository->select(['grupo_id' => $grupo_id])
                ->with(['grupo'])->orderBy('cantidad', 'ASC')->first();

            $data['mayorCantidad'] = $itemsRepository->select(['grupo_id' => $grupo_id])
                ->with(['grupo'])->orderBy('cantidad', 'DESC')->first();

            // Costos
            $data['menorCosto'] = $itemsRepository->select(['grupo_id' => $grupo_id])
                ->with(['grupo'])->orderBy('precio', 'ASC')->first();

            $data['mayorCosto'] = $itemsRepository->select(['grupo_id' => $grupo_id])
                ->with(['grupo'])->orderBy('precio', 'DESC')->first();

            // Calculo de diferencia en proveedor

            /** @var integer $precioContratoSegunContrato */
            $precioContratoSegunContrato = $grupo->first()->proveedor->precio;

            /** @var object $allItems */
            $allItems    = $itemsRepository->select(['active' => true])->with(['grupo'])->get();
            $sumAllItems = collect($allItems)->sum('precio');

            $data['precioProveedorSegunContrato'] = money_format('%+.2n', $precioContratoSegunContrato);
            $data['precioProveedorSegunSistema']  = money_format('%+.2n', $sumAllItems);
            $data['precioProveedorDiferencia']    = money_format('%+.2n', ($sumAllItems - $precioContratoSegunContrato));

            // Calculo de diferencia en grupo

            /** @var integer $precioGrupoSegunContrato */
            $precioGrupoSegunContrato = $grupo->first()->precio;

            $data['precioGrupoSegunContrato'] = money_format('%+.2n', $precioGrupoSegunContrato);
            $data['precioGrupoSegunSistema']  = money_format('%+.2n', $data['precio']);
            $data['precioGrupoDiferencia']    = money_format('%+.2n', ($data['precio'] - $precioGrupoSegunContrato));
        }

        return $data;
    }
}
