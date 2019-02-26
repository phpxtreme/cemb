@extends('base.base')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <form class="mb-3">
                <div class="form-row">
                    <div class="col-4">
                        <label for="contrato-select-proveedor">
                            <small><strong>Proveedor:</strong></small>
                        </label>
                        <select name="contrato-select-proveedor" id="contrato-select-proveedor" class="form-control chosen-select chosen-single">
                            <option></option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="contrato-select-grupo">
                            <strong>
                                <small><strong>Grupo:</strong></small>
                            </strong>
                        </label>
                        <select name="contrato-select-grupo" id="contrato-select-grupo" class="form-control chosen-select">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-2 text-center">
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
                        <th scope="col" class="col-1 text-center">Unidad</th>
                        <th scope="col" class="col-1 text-center">Modelo</th>
                        <th scope="col" class="col-1 text-center">Precio</th>
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