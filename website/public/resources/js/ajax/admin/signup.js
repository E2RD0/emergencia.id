const API = HOME_PATH + "api/app/user.php?action=";
$("#register-form").submit(function (event) {
    event.preventDefault();
    if (
        !validatePassword(
            document.querySelector('input[name="password"]').value
        )
    ) {
        return;
    }
    $.ajax({
        type: "post",
        url: API + "signup",
        data: $("#register-form").serialize(),
        dataType: "json",
        beforeSend: function () {
            $("#register-submit")[0].innerHTML =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando';
        },
        complete: function () {
            $("#register-submit")[0].innerHTML = "Continuar";
        },
    })
        .done(function (response) {
            // If user is registered succesfully
            if (response.status == 1) {
                redirect("app/user/new");
            } else if (response.status == -1) {
                swal(2, response.exception);
            }
            var errors = response.errors;
            checkFields(errors, "Email");
            checkFields(errors, "Contraseña");
        })
        .fail(function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + " " + jqXHR.statusText);
            }
        });
});
function validatePassword(pass) {
    const regEx = /^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/g;
    let errors = [];
    if (pass && !(pass === "")) {
        if (regEx.test(pass)) {
            checkFields(errors, "Contraseña");
            return true;
        } else {
            errors["Contraseña"] = [
                "La contraseña no cumple con los parámetros requeridos.",
            ];
        }
    } else {
        errors["Contraseña"] = ["Por favor ingresa una contraseña."];
    }
    checkFields(errors, "Contraseña");
    return false;
}
