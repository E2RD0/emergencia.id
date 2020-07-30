const API_PERFIL = HOME_PATH + 'api/app/perfil.php?action=';

$('#names-submit').click(
    function(e){
        $('#stepOne').removeClass('active');
         $('#stepTwo').tab('show');
    }
);

$('#go-back-1').click(step1);

function step1(){
    $('#stepTwo').removeClass('active');
     $('#stepOne').tab('show');
}

$('#tel-submit').click(submit);

function submit(){
    var nombres = $('#inputNombres').val();
    var apellidos = $('#inputApellidos').val();
    var tel = $('#inputTeléfono').val();

    var dataObject = {};
    dataObject['nombres'] = nombres;
    dataObject['apellidos'] = apellidos;
    dataObject['tel'] = tel;

    $.ajax({
        type: 'post',
        url: API_PERFIL + 'newUser',
        data: dataObject,
        beforeSend: function() {
            $("#tel-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando';
        },
        complete: function() {
            $("#tel-submit")[0].innerHTML = 'Continuar';
        }
    })
    .done(function( response ) {
        // If user login is succesfull
        if ( response.status == 1) {
            redirect('app/profile/edit/' + response.id_perfil_medico);
        } else if (response.status == -1){
            step1();
            swal(2, response.exception);
        }
        else if (response.status == -2){
            swal(3, response.exception, 'app/user/profiles', 3000 );
        }
        else {
            step1();
        }
        var errors = response.errors;
        checkFields(errors, 'Nombres');
        checkFields(errors, 'Apellidos');
        checkFields(errors, 'Teléfono');
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

/*
$( '#register-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'signup',
        data: $( '#register-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#register-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando';
        },
        complete: function() {
            $("#register-submit")[0].innerHTML = 'Continuar';
        }
    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            redirect('app/user/new');
        } else if(response.status==-1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Email');
        checkFields(errors, 'Contraseña');
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});
*/
