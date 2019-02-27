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
});