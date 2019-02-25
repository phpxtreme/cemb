$(document).ready(function () {

    // Logout
    $('.logout').click(function (event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();

        return false;
    })
})