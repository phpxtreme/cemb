$(document).ready(function () {

    // Chosen-JS Plugin
    $('.chosen-select').chosen({
        no_results_text: "Ningún resultado para: ",
    });

    // Logout
    $('.logout').click(function (event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();

        return false;
    })
})