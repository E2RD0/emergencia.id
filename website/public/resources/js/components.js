//Check for errors on input fields
function checkFields(errors, fieldName){
    var label = document.getElementById('error' + fieldName.replace(/ /g,''));
    var input = document.getElementById('input' + fieldName.replace(/ /g,''));
    if (errors[fieldName]) {
        label.innerHTML = errors[fieldName][0];
        input.classList.add('error');
    }
    else{
        if(input.classList.contains('error')){
            input.classList.remove('error');
        }
        label.innerHTML = '';
    }
}

//shows an alert
function swal(type, text, url = false, timer=0, allowCancel = false, callback = undefined){
    var result = false;
    switch (type) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Confirmar";
            icon = "question";
            break;
        default:
            title = "Aviso";
            icon = "info";
    }
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        timer: timer,
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancelar',
        showCancelButton: allowCancel,
        allowOutsideClick: allowCancel,
        allowEscapeKey: allowCancel
    })
    .then(function(value) {
        if(url){
            redirect(url);
        }
        if(value.isConfirmed && callback!= undefined){
            callback();
        }
    });
}

//redirects to specified url
function redirect(url, link=false){
    if(link){
        window.location.href = window.location.origin + HOME_PATH + url;
    }
    else{
        window.location.replace(window.location.origin + HOME_PATH + url);
    }
}

function readRows( api , el=false, action = 'show', fun=false)
{
    function before(){};
    function after(){}
    if(el){
        function before() {
            el.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
        }
        function after() {
            el.innerHTML = '';
        }
    }
    $.ajax({
        dataType: 'json',
        url: api + action,
        beforeSend: before,
        complete: after
    })
    .done(function( response ) {
        if(fun){
            fun(response.dataset);
        }
        else{
            fillTable( response.dataset );
        }
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

function confirmDelete( api, identifier, el=false, text=false)
{
    function before(){};
    function after(){};
    if(el){
        if(el.closest(".td-actions")){
            var buttons = el.closest(".td-actions");
            var innerButtons = buttons.innerHTML;
        }
        function before() {
            if(buttons)
                buttons.innerHTML = '<div class="spinner-grow" role="status"><span class="sr-only">Cargando...</span></div>';
        }
        function after() {
            if(buttons){
                buttons.innerHTML = innerButtons;
                $(buttons).children().find('.dropdown').toggleClass('show');
                $(buttons).children().find('.dropdown-menu').toggleClass('show');
            }
        }
    }
    swal(4, (text ? text : '¿Desea eliminar el registro?'), false, 0, true, del);
    function del() {
        $.ajax({
            type: 'post',
            url: api + 'delete',
            data: identifier,
            dataType: 'json',
            beforeSend: before,
            complete: after
        })
        .done(function( response ) {
            if ( response.status ) {
                readRows( api );
                swal( 1, response.message);
            } else {
                swal( 2, response.exception);
            }
        })
        .fail(function( jqXHR ) {
            if ( jqXHR.status == 200 ) {
                console.log( jqXHR.responseText );
            } else {
                console.log( jqXHR.status + ' ' + jqXHR.statusText );
            }
        });
    }
}

function saveRow( api, action, form, submitButton, checkErrors = [], id=0, complete = false, done=false)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: api + action,
        data: $(form).serialize()+"&id="+id,
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        }
    })
    .done(function( response ) {
        // If user is registered successfully
        if (response.status==1) {
            readRows(api);
            swal(1, response.message);
            form.reset();
        } else if(response.status==-1){
            console.log('error con db');
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkErrors.forEach( function(el) {
            checkFields(errors, el);
        });
    })
    .always(function( response ) {
        if(response){
            if (response.status==1) {
                if(done){done();}
                else{
                    submitButton.innerHTML = inner;
                }
            }
            else {
                if(complete){complete();}
                else {
                    submitButton.innerHTML = inner;
                }
            }
        }
        else {
            if(complete){complete();}
            else {
                submitButton.innerHTML = inner;
            }
        }
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

function fetchResource(urlString) {
    fetch(urlString)
        .then(resp => resp.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = '';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            swal(1, 'Report generated successfully');
        })
        .catch(() => swal(2, 'Error while generating the report'));
}
