@extends('base.base')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success">
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
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card rounded-0">
                        <div class="default-card-header">
                            <i class="fa fa-angle-double-right"></i>
                            Header
                        </div>
                        <div class="card-body text-center">
                            <h1 class="card-title total-records">100</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card rounded-0">
                        <div class="default-card-header">
                            <i class="fa fa-angle-double-right"></i>
                            Detalles del Grupo
                        </div>
                        <h1 class="card-title text-center pt-3">100</h1>
                        <table class="table table-sm table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    Proveedor
                                </td>
                                <td>
                                    1
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Grupo
                                </td>
                                <td>
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total de Items
                                </td>
                                <td>
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Unidades Utilizadas
                                </td>
                                <td>
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Monedas Utilizadas
                                </td>
                                <td>
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Menor Item Solicitado
                                </td>
                                <td>
                                    2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mayor Item Solicitado
                                </td>
                                <td>
                                    2
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="bg-dark">
            <div class="card rounded-0">
                <div class="default-card-header">
                    <i class="fa fa-angle-double-right"></i>
                    Items
                </div>
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                    <tr class="d-flex">
                        <th scope="col" class="col-1 text-center">#</th>
                        <th scope="col" class="col-6 text-center">Descripción</th>
                        <th scope="col" class="col-1 text-center">Cantidad</th>
                        <th scope="col" class="col-1 text-center">Unidad</th>
                        <th scope="col" class="col-1 text-center">Modelo</th>
                        <th scope="col" class="col-1 text-center">Precio</th>
                        <th scope="col" class="col-1 text-center">Moneda</th>
                    </tr>
                    </thead>
                    <tbody id="contrato-grupo-items-table">
                    <tr class="d-flex table-information">
                        <td class="col-sm-12 alert-danger text-center">
                            Sin resultados para mostrar
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection