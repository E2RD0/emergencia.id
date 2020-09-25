const API = HOME_PATH + 'api/admin/user.php?action=';

function logout() {
    swal(4, 'Are you sure you want to log out?', false, 0, true, out);

    function out() {
        $.ajax({
                dataType: 'json',
                url: API + 'logout'
            })
            .done(function(response) {
                if (response.status) {
                    swal(1, response.message, 'admin/user/login');
                } else {
                    swal(2, response.exception);
                }
            })
            .fail(function(jqXHR) {
                // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                if (jqXHR.status == 200) {
                    console.log(jqXHR.responseText);
                } else {
                    console.log(jqXHR.status + ' ' + jqXHR.statusText);
                }
            });
    }
}
