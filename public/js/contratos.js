$(document).ready(function () {

    // Contratos
    $('#contrato-select-proveedor').change(function () {
        $.post('contratos/proveedor/grupos', {
            proveedor_id: $(this).val()
        }, function (data) {

            $('#contrato-select-grupo').empty()
                .append("<option></option>")
                .trigger("chosen:updated");

            $.each(data, function (index, item) {
                $('#contrato-select-grupo').append("<option value='" + item.id + "'>" + item.name + "</option>")
                    .trigger("chosen:updated");
            })

            $('#contrato-grupo-items-table tr:has(td)').remove();

            $('#contrato-grupo-items-table').html([
                "<tr class='d-flex table-information'>",
                "<td class='col-sm-12 alert-danger text-center'>Sin resultados para mostrar</td>",
                "</tr>"
            ].join(""));
        });
    });

    $('#contrato-select-grupo').change(function () {

        $.post('contratos/proveedor/grupo/detalles', {
            grupo_id: $(this).val()
        }, function (data) {
            $('#contrato-detalles-grupo-proveedor').html(data.proveedor)
            $('#contrato-detalles-grupo-grupo').html(data.grupo)
            $('#contrato-detalles-grupo-total').html(data.total)
            $('#contrato-detalles-grupo-unidades').html('[ ' + data.unidades.join(' ] [ ') + ' ]')
            $('#contrato-detalles-grupo-monedas').html('[ ' + data.monedas.join(' ] [ ') + ' ]')

            // Cantidades
            $('#contrato-detalles-grupo-menor-cantidad-descripcion').html(data.menorCantidad.descripcion);
            $('#contrato-detalles-grupo-menor-cantidad-modelo').html(data.menorCantidad.modelo);
            $('#contrato-detalles-grupo-menor-cantidad-cantidad').html(data.menorCantidad.cantidad);

            $('#contrato-detalles-grupo-mayor-cantidad-descripcion').html(data.mayorCantidad.descripcion);
            $('#contrato-detalles-grupo-mayor-cantidad-modelo').html(data.mayorCantidad.modelo);
            $('#contrato-detalles-grupo-mayor-cantidad-cantidad').html(data.mayorCantidad.cantidad);

            // Costos
            $('#contrato-detalles-grupo-menor-costo-descripcion').html(data.menorCosto.descripcion);
            $('#contrato-detalles-grupo-menor-costo-modelo').html(data.menorCosto.modelo);
            $('#contrato-detalles-grupo-menor-costo-costo').html(data.menorCosto.precio);

            $('#contrato-detalles-grupo-mayor-costo-descripcion').html(data.mayorCosto.descripcion);
            $('#contrato-detalles-grupo-mayor-costo-modelo').html(data.mayorCosto.modelo);
            $('#contrato-detalles-grupo-mayor-costo-costo').html(data.mayorCosto.precio);

            // Calculo de diferencia en Proveedor
            $('#contrato-detalles-proveedor-precio-segun-contrato').html(data.precioProveedorSegunContrato);
            $('#contrato-detalles-proveedor-precio-segun-sistema').html(data.precioProveedorSegunSistema);
            $('#contrato-detalles-proveedor-precio-diferencia').html(data.precioProveedorDiferencia);

            // Calculo de diferencia en grupo
            $('#contrato-detalles-grupo-precio-segun-contrato').html(data.precioGrupoSegunContrato);
            $('#contrato-detalles-grupo-precio-segun-sistema').html(data.precioGrupoSegunSistema);
            $('#contrato-detalles-grupo-precio-grupo-diferencia').html(data.precioGrupoDiferencia);

        });

        $.post('contratos/proveedor/grupo/items', {
            grupo_id: $(this).val()
        }, function (data) {
            let array = [], number = 1;

            if (data.length) {
                $('#contrato-grupo-items-table tr:has(td)').remove();

                $.each(data, function (index, item) {
                    array.push("<tr class='d-flex'>");
                    array.push("<td class='col-sm-1 text-center'>" + number++ + "</td>");
                    array.push("<td class='col-sm-6'>" + item.descripcion + "</td>");
                    array.push("<td class='col-sm-1 text-center'>" + item.cantidad + "</td>");
                    array.push("<td class='col-sm-1 text-center'>" + item.unidad + "</td>");
                    array.push("<td class='col-sm-1 text-center'>" + item.modelo + "</td>");
                    array.push("<td class='col-sm-1 text-center'>" + item.precio + "</td>");
                    array.push("<td class='col-sm-1 text-center'>" + item.moneda + "</td>");
                    array.push("</tr>");
                })
            } else {
                array.push("<tr class='d-flex table-information'>");
                array.push("<td class='col-sm-12 alert-danger text-center'>Sin resultados para mostrar</td>");
                array.push("</tr>");
            }

            $('#contrato-grupo-items-table').html(array.join(""));
        });
    });
})