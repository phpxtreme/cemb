@extends('base.base')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form class="mb-3">
                <div class="form-row">
                    <div class="col-4">
                        <select name="proveedor" id="contrato-proveedor" class="form-control"></select>
                    </div>
                    <div class="col-6">
                        <select name="grupo" id="contrato-grupo" class="form-control"></select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success">
                            <i class="fa fa-search"></i>
                            Buscar...
                        </button>
                    </div>
                </div>
            </form>
            <hr class="bg-dark">
            <div class="card rounded-0">
                <div class="card-header bg-gradient-dark text-white rounded-0 pt-1 pb-1">
                    <i class="fa fa-angle-double-right"></i>
                    Items
                </div>
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                    <tr class="d-flex">
                        <th scope="col" class="col-1 text-center">#</th>
                        <th scope="col" class="col-8 text-center">Descripción</th>
                        <th scope="col" class="col-1 text-center">Unidades</th>
                        <th scope="col" class="col-1 text-center">Tamaño</th>
                        <th scope="col" class="col-1 text-center">PVP Final</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="d-flex">
                        <td class="col-sm-1">
                            1
                        </td>
                        <td class="col-sm-8">
                            1
                        </td>
                        <td class="col-sm-1">
                            1
                        </td>
                        <td class="col-sm-1">
                            1
                        </td>
                        <td class="col-sm-1">
                            1
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection