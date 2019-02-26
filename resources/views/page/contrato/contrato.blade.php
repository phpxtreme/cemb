@extends('base.base')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form class="mb-3">
                <div class="form-row">
                    <div class="col-4">
                        <label for="contrato-proveedor">
                            <small><strong>Proveedor:</strong></small>
                        </label>
                        <select name="proveedor" id="contrato-proveedor" class="form-control chosen-select">
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="contrato-proveedor">
                            <strong>
                                <small><strong>Grupo:</strong></small>
                            </strong>
                        </label>
                        <select name="grupo" id="contrato-grupo" class="form-control chosen-select chosen-single">
                            @foreach($grupos as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2 text-center">
                        <button class="btn btn-primary" title="Imprimir">
                            <i class="fa fa-print"></i>
                        </button>
                        <button class="btn btn-danger" title="Descargar">
                            <i class="fa fa-download"></i>
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
                        <th scope="col" class="col-7 text-center">Descripción</th>
                        <th scope="col" class="col-1 text-center">Cantidad</th>
                        <th scope="col" class="col-1 text-center">Ud</th>
                        <th scope="col" class="col-1 text-center">Modelo</th>
                        <th scope="col" class="col-1 text-center">PVP Final</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="d-flex">
                        <td class="col-sm-1">
                            1
                        </td>
                        <td class="col-sm-7">
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