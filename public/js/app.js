$(document).ready(function () {

    // CSRF TOKEN
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Chosen-JS Plugin
    $('.chosen-select').chosen({
        no_results_text: "Ningún resultado para: ",
        placeholder_text_single: 'Seleccione...'
    });

    // Logout
    $('.logout').click(function (event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();

        return false;
    })

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