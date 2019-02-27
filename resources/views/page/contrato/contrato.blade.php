@extends('base.base')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success rounded-0">
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
                            Precio del Contrato
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Según Contrato</strong>
                                    <p>$0.00</p>
                                </div>
                                <div class="col-sm-6">
                                    <strong>Según Sistema</strong>
                                    <p>$0.00</p>
                                </div>
                                <div class="col-sm-12">
                                    <strong>Diferencia</strong>
                                    <p>$0.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-0">
                        <div class="default-card-header">
                            <i class="fa fa-angle-double-right"></i>
                            Precio del Grupo
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Según Contrato</strong>
                                    <p>$0.00</p>
                                </div>
                                <div class="col-sm-6">
                                    <strong>Según Sistema</strong>
                                    <p>$0.00</p>
                                </div>
                                <div class="col-sm-12">
                                    <strong>Diferencia</strong>
                                    <p>$0.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card rounded-0">
                        <div class="default-card-header">
                            <i class="fa fa-angle-double-right"></i>
                            Detalles del Grupo
                        </div>
                        <table class="table table-sm table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    <strong>Proveedor</strong>
                                </td>
                                <td id="contrato-detalles-grupo-proveedor" class="text-center"></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Grupo</strong>
                                </td>
                                <td id="contrato-detalles-grupo-grupo" class="text-center"></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Total de Items</strong>
                                </td>
                                <td id="contrato-detalles-grupo-total" class="text-center"></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Unidades Utilizadas</strong>
                                </td>
                                <td id="contrato-detalles-grupo-unidades" class="text-center"></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Monedas Utilizadas</strong>
                                </td>
                                <td id="contrato-detalles-grupo-monedas" class="text-center"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card rounded-0">
                        <div class="default-card-header">
                            <i class="fa fa-angle-double-right"></i>
                            Costos
                        </div>
                        <table class="table table-sm table-striped">
                            <tr class="d-flex">
                                <td class="col-3">
                                    <strong>Menor Costo</strong>
                                </td>
                                <td id="contrato-detalles-grupo-menor-costo-descripcion" class="text-center col-5"></td>
                                <td id="contrato-detalles-grupo-menor-costo-modelo" class="text-center col-2"></td>
                                <td id="contrato-detalles-grupo-menor-costo-costo" class="text-center col-2"></td>
                            </tr>
                            <tr class="d-flex">
                                <td class="col-3">
                                    <strong>Mayor Costo</strong>
                                </td>
                                <td id="contrato-detalles-grupo-mayor-costo-descripcion" class="text-center col-5"></td>
                                <td id="contrato-detalles-grupo-mayor-costo-modelo" class="text-center col-2"></td>
                                <td id="contrato-detalles-grupo-mayor-costo-costo" class="text-center col-2"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="card rounded-0">
                        <div class="default-card-header">
                            <i class="fa fa-angle-double-right"></i>
                            Cantidades
                        </div>
                        <table class="table table-sm table-striped">
                            <tr class="d-flex">
                                <td class="col-3">
                                    <strong>Menor Cantidad</strong>
                                </td>
                                <td id="contrato-detalles-grupo-menor-cantidad-descripcion" class="text-center col-5"></td>
                                <td id="contrato-detalles-grupo-menor-cantidad-modelo" class="text-center col-2"></td>
                                <td id="contrato-detalles-grupo-menor-cantidad-cantidad" class="text-center col-2"></td>
                            </tr>
                            <tr class="d-flex">
                                <td class="col-3">
                                    <strong>Mayor Cantidad</strong>
                                </td>
                                <td id="contrato-detalles-grupo-mayor-cantidad-descripcion" class="text-center col-5"></td>
                                <td id="contrato-detalles-grupo-mayor-cantidad-modelo" class="text-center col-2"></td>
                                <td id="contrato-detalles-grupo-mayor-cantidad-cantidad" class="text-center col-2"></td>
                            </tr>
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
@section('javascript')
    <script type="text/javascript" src="{{ asset('js/contratos.js') }}"></script>
@endsection