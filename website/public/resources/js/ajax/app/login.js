const API = HOME_PATH + "api/app/user.php?action=";
let num = 0;
let block = false;
$("#login-form").submit(function (event) {
    num = num + 1;
    console.log(num);
    event.preventDefault();
    let a = document.getElementById("inputEmail");
    if (block) {
        swal(2, "Su cuenta ha sido bloqueada temporalmente");
    }
    if (num == 3) {
        fetch(`${API}intentos&email=${a.value}`);
        swal(2, "Su cuenta ha sido bloqueada temporalmente");
        block = true;
    }
    $.ajax({
        type: "post",
        url: API + "login",
        data: $("#login-form").serialize(),
        dataType: "json",
        beforeSend: function () {
            $("#login-submit")[0].innerHTML =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando';
        },
        complete: function () {
            $("#login-submit")[0].innerHTML = "Acceder";
        },
    })
        .done(function (response) {
            // If user login is succesfull
            if (response.status == 1) {
                response.block
                    ? swal(2, "Su cuenta ha sido bloqueada temporalmente")
                    : redirect("app/user/profiles");
            } else if (response.status == 2) {
                $("#2fa-modal").modal("show");
            } else if (response.status == -1) {
                swal(2, response.exception);
            }
            /* response.block ? (block = true) : (block = false); */
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

function reset2fa() {
    var $form = $("#form");
    var $group = $form.find(".form__pincode");
    var $inputs = $group.find(":input");
    var $first = $form.find("[name=pincode-1]");

    $inputs.each(function () {
        // clear all fields
        $(this).val("");

        // enable all fields
        $(this).prop("disabled", false);
    });
    // remove response status class
    $group.removeClass("form__group--success form__group--error");

    // disable submit button

    // focus to first field
    $first.focus();
}

$(function () {
    // setting
    var debug = false;
    // pincode
    var _pincode = [];
    var _req = null;

    // main form
    var $form = $("#form");

    // pincode group
    var $group = $form.find(".form__pincode");

    // all input fields
    var $inputs = $group.find(":input");

    // input fields
    var $first = $form.find("[name=pincode-1]"),
        $second = $form.find("[name=pincode-2]"),
        $third = $form.find("[name=pincode-3]"),
        $fourth = $form.find("[name=pincode-4]"),
        $fifth = $form.find("[name=pincode-5]"),
        $sixth = $form.find("[name=pincode-6]");

    // submit button

    // all fields
    $inputs
        .on("keyup", function (event) {
            var code = event.keyCode || event.which;

            if (code === 9 && !event.shiftKey) {
                // prevent default event
                event.preventDefault();

                // focus to submit button
                $(".button-p--primary").focus();
            }
        })
        .inputmask({
            mask: "9",
            placeholder: "",
            showMaskOnHover: false,
            showMaskOnFocus: false,
            clearIncomplete: true,
            onincomplete: function () {
                !debug || console.log("inputmask incomplete");
            },
            oncleared: function () {
                var index = $inputs.index(this),
                    prev = index - 1,
                    next = index + 1;

                if (prev >= 0) {
                    // clear field
                    $inputs.eq(prev).val("");

                    // focus field
                    $inputs.eq(prev).focus();

                    // remove last nubmer
                    _pincode.splice(-1, 1);
                } else {
                    return false;
                }

                !debug || console.log("[oncleared]", prev, index, next);
            },
            onKeyValidation: function (key, result) {
                var index = $inputs.index(this),
                    prev = index - 1,
                    next = index + 1;

                // focus to next field
                if (prev < 6) {
                    $inputs.eq(next).focus();
                }

                !debug ||
                    console.log(
                        "[onKeyValidation]",
                        index,
                        key,
                        result,
                        _pincode
                    );
            },
            onBeforePaste: function (data, opts) {
                $.each(data.split(""), function (index, value) {
                    // set value
                    $inputs.eq(index).val(value);

                    !debug || console.log("[onBeforePaste:each]", index, value);
                });

                return false;
            },
        });

    // first field
    $("[name=pincode-1]")
        .on("focus", function (event) {
            !debug || console.log("[1:focus]", _pincode);
        })
        .inputmask({
            oncomplete: function () {
                // add first character
                _pincode.push($(this).val());

                // focus to second field
                $("[name=pincode-2]").focus();

                !debug || console.log("[1:oncomplete]", _pincode);
            },
        });

    // second field
    $("[name=pincode-2]")
        .on("focus", function (event) {
            if (!($first.val().trim() !== "")) {
                // prevent default
                event.preventDefault();

                // reset pincode
                _pincode = [];

                // handle each field
                $inputs.each(function () {
                    // clear each field
                    $(this).val("");
                });

                // focus to first field
                $first.focus();
            }

            !debug || console.log("[2:focus]", _pincode);
        })
        .inputmask({
            oncomplete: function () {
                // add second character
                _pincode.push($(this).val());

                // focus to third field
                $("[name=pincode-3]").focus();

                !debug || console.log("[2:oncomplete]", _pincode);
            },
        });

    // third field
    $("[name=pincode-3]")
        .on("focus", function (event) {
            if (!($first.val().trim() !== "" && $second.val().trim() !== "")) {
                // prevent default
                event.preventDefault();

                // reset pincode
                _pincode = [];

                // handle each field
                $inputs.each(function () {
                    // clear each field
                    $(this).val("");
                });

                // focus to first field
                $first.focus();
            }

            !debug || console.log("[3:focus]", _pincode);
        })
        .inputmask({
            oncomplete: function () {
                // add third character
                _pincode.push($(this).val());

                // focus to fourth field
                $("[name=pincode-4]").focus();

                !debug || console.log("[3:oncomplete]", _pincode);
            },
        });

    // fourth field
    $("[name=pincode-4]")
        .on("focus", function (event) {
            if (
                !(
                    $first.val().trim() !== "" &&
                    $second.val().trim() !== "" &&
                    $third.val().trim() !== ""
                )
            ) {
                // prevent default
                event.preventDefault();

                // reset pincode
                _pincode = [];

                // handle each field
                $inputs.each(function () {
                    // clear each field
                    $(this).val("");
                });

                // focus to first field
                $first.focus();
            }

            !debug || console.log("[4:focus]", _pincode);
        })
        .inputmask({
            oncomplete: function () {
                // add fo fourth character
                _pincode.push($(this).val());

                // focus to fifth field
                $("[name=pincode-5]").focus();

                !debug || console.log("[4:oncomplete]", _pincode);
            },
        });

    // fifth field
    $("[name=pincode-5]")
        .on("focus", function (event) {
            if (
                !(
                    $first.val().trim() !== "" &&
                    $second.val().trim() !== "" &&
                    $third.val().trim() !== "" &&
                    $fourth.val().trim() !== ""
                )
            ) {
                // prevent default
                event.preventDefault();

                // reset pincode
                _pincode = [];

                // handle each field
                $inputs.each(function () {
                    // clear each field
                    $(this).val("");
                });

                // focus to first field
                $first.focus();
            }

            !debug || console.log("[5:focus]", _pincode);
        })
        .inputmask({
            oncomplete: function () {
                // add fifth character
                _pincode.push($(this).val());

                // focus to sixth field
                $("[name=pincode-6]").focus();

                !debug || console.log("[5:oncomplete]", _pincode);
            },
        });

    // sixth field
    $("[name=pincode-6]")
        .on("focus", function (event) {
            if (
                !(
                    $first.val().trim() !== "" &&
                    $second.val().trim() !== "" &&
                    $third.val().trim() !== "" &&
                    $fourth.val().trim() !== "" &&
                    $fifth.val().trim() !== ""
                )
            ) {
                // prevent default
                event.preventDefault();

                // reset pincode
                _pincode = [];

                // handle each field
                $inputs.each(function () {
                    // clear each field
                    $(this).val("");
                });

                // focus to first field
                $first.focus();
            }

            !debug || console.log("[6:focus]", _pincode);
        })
        .inputmask({
            oncomplete: function () {
                // add sixth character
                _pincode.push($(this).val());

                // pin length not equal to six characters
                if (_pincode.length !== 6) {
                    // reset pin
                    _pincode = [];

                    // handle each field
                    $inputs.each(function () {
                        // clear each field
                        $(this).val("");
                    });

                    // focus to first field
                    $("[name=pincode-1]").focus();
                } else {
                    // handle each field
                    $inputs.each(function () {
                        // disable field
                        $(this).prop("disabled", true);
                    });

                    // send request
                    function reset() {
                        // reset pin
                        _pincode = [];

                        // reset request
                        _req = null;
                        reset2fa();
                        // handle each field
                    }
                    $.ajax({
                        type: "POST",
                        url: API + "2fa-login",
                        dataType: "json",
                        data: {
                            code: _pincode.join(""),
                            email: $("#inputEmail").val().trim(),
                        },
                    })
                        .done(function (data) {
                            try {
                                !debug || console.log("data", data);

                                if (data.status === 1) {
                                    redirect("app/user/profiles");
                                } else if (data.status === 0) {
                                    $("#login-form").trigger("reset");
                                    swal(
                                        2,
                                        "Código de autenticación incorrecto"
                                    );
                                    setTimeout(function () {
                                        $("#2fa-modal").modal("hide");
                                    }, 1800);
                                    setTimeout(reset, 2000);
                                } else if (data.status === -1) {
                                    swal(2, data.exception);
                                }
                            } catch (err) {}
                        })
                        .fail(function (jqXHR, textStatus, errorThrown) {
                            $group.removeClass("form__group--error");
                            if (jqXHR.status == 200) {
                                console.log(jqXHR.responseText);
                            } else {
                                console.log(
                                    jqXHR.status + " " + jqXHR.statusText
                                );
                            }
                        });
                }

                !debug || console.log("[6:oncomplete]", _pincode);
            },
        });
});
