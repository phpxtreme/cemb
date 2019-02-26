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
            proveedor: $(this).val()
        }, function (data) {

            $('#contrato-select-grupo').empty()
                .trigger("chosen:updated");

            if (!data.length) {
                $('#contrato-select-grupo').append('<option></option>')
                    .trigger("chosen:updated");
            } else {
                $.each(data, function (index, item) {
                    $('#contrato-select-grupo').append("<option value='" + item.id + "'>" + item.name + "</option>")
                        .trigger("chosen:updated");
                })
            }
        });
    })
})