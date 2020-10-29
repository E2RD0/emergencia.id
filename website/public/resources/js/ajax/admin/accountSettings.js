var twoFactorCheck = false;

const API_USUARIOS = HOME_PATH + 'api/admin/user.php?action=';
$( document ).ready(function() {
    getUserInfo();
});

function getUserInfo()
{
    $.ajax({
        dataType: 'json',
        url: API_USUARIOS + 'info'
    })
    .done(function( response ) {
        if (response.status) {
                $( '#spinnerSettings' )[0].innerHTML = '';
                $( '#inputEmail' ).val( response.dataset.email );
                $( '#inputTeléfono' ).val( response.dataset.telefono );
                if(response.dataset.secret2fa != null){
                    $("#2fa-check").prop('checked', true);
                }
                $("#2fa-check").prop('disabled', false);

        } else {
            swal(2, response.exception);
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

$( '#account-form' ).submit(function( event ) {
    event.preventDefault();
    updateClient(this, document.getElementById('account-submit'));
});

$( '#password-form' ).submit(function( event ) {
    event.preventDefault();
    updatePassword(this, document.getElementById('password-submit'));
});

function updateClient(form, submitButton)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'update',
        data: $(form).serialize(),
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        },
        complete: function() {
            submitButton.innerHTML = inner;
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            getUserInfo();
        } else if(response.status==-1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Email');
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

function updatePassword(form, submitButton)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'updatePassword',
        data: $(form).serialize(),
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        },
        complete: function() {
            submitButton.innerHTML = inner;
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            $('#password-form')[0].reset();
            swal(1, response.message);
        } else if(response.status==-1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Contraseña');
        checkFields(errors, 'Nueva Contraseña');
        checkFields(errors, 'NewPasswordR');
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


$("#2fa-check").change(function(){
   var check = $(this).prop('checked');
   if(check == true) {
     $('#2fa-modal').modal('show');
     $(this).prop('checked', false);
   } else {
       $(this).prop('checked', true);
       swal(4, '¿Estás seguro de que quieres desactivar la verificación en 2 pasos?', false, 0, true, disable2fa);
   }
});

function disable2fa(){
    $.ajax({
        type: "POST",
        url: API_USUARIOS + "save2fa",
        dataType: "json",
        data: {
          'secret': ''
        }
      })
      .done(function(data) {
          if (data.status === 1) {
            $("#2fa-check").prop('checked', false);
          }

          if (data.status === 0) {
              swal(2, 'Error al desactivar la verificación en dos pasos');
          }
      })
      .fail(function(jqXHR) {
        if (jqXHR.status == 200) {
            console.log(jqXHR.responseText);
        } else {
            console.log(jqXHR.status + " " + jqXHR.statusText);
        }
    });
}

$(function() {
  // setting
  var debug = false;
  // pincode
  var _pincode = [];
  var _req = null;

  // main form
  var $form = $('#form');

  // pincode group
  var $group = $form.find('.form__pincode');

  // all input fields
  var $inputs = $group.find(':input');

  // input fields
  var $first = $form.find('[name=pincode-1]')
    , $second = $form.find('[name=pincode-2]')
    , $third = $form.find('[name=pincode-3]')
    , $fourth = $form.find('[name=pincode-4]')
    , $fifth = $form.find('[name=pincode-5]')
    , $sixth = $form.find('[name=pincode-6]');

  // submit button
  var $button = $form.find('.button-p--primary');

  // all fields
  $inputs
    .on('keyup', function(event) {
      var code = event.keyCode || event.which;

      if (code === 9 && ! event.shiftKey) {
        // prevent default event
        event.preventDefault();

        // focus to submit button
        $('.button-p--primary').focus();
      }
    })
    .inputmask({
      mask: '9',
      placeholder: '',
      showMaskOnHover: false,
      showMaskOnFocus: false,
      clearIncomplete: true,
      onincomplete: function() {
        ! debug || console.log('inputmask incomplete');
      },
      oncleared: function() {
        var index = $inputs.index(this)
          , prev = index - 1
          , next = index + 1;

        if (prev >= 0) {
          // clear field
          $inputs.eq(prev).val('');

          // focus field
          $inputs.eq(prev).focus();

          // remove last nubmer
          _pincode.splice(-1, 1)
        } else {
          return false;
        }

        ! debug || console.log('[oncleared]', prev, index, next);
      },
      onKeyValidation: function(key, result) {
        var index = $inputs.index(this)
          , prev = index - 1
          , next = index + 1;

        // focus to next field
        if (prev < 6) {
          $inputs.eq(next).focus();
        }

        ! debug || console.log('[onKeyValidation]', index, key, result, _pincode);
      },
      onBeforePaste: function (data, opts) {
        $.each(data.split(''), function(index, value) {
          // set value
          $inputs.eq(index).val(value);

          ! debug || console.log('[onBeforePaste:each]', index, value);
        });

        return false;
      }
    });

  // first field
  $('[name=pincode-1]')
    .on('focus', function(event) {
      ! debug || console.log('[1:focus]', _pincode);
    })
    .inputmask({
      oncomplete: function() {
        // add first character
        _pincode.push($(this).val());

        // focus to second field
        $('[name=pincode-2]').focus();

        ! debug || console.log('[1:oncomplete]', _pincode);
      }
    });

  // second field
  $('[name=pincode-2]')
    .on('focus', function(event) {
      if ( ! ($first.val().trim() !== '')) {
        // prevent default
        event.preventDefault();

        // reset pincode
        _pincode = [];

        // handle each field
        $inputs
          .each(function() {
          // clear each field
          $(this).val('');
        });

        // focus to first field
        $first.focus();
      }

      ! debug || console.log('[2:focus]', _pincode);
    })
    .inputmask({
      oncomplete: function() {
        // add second character
        _pincode.push($(this).val());

        // focus to third field
        $('[name=pincode-3]').focus();

        ! debug || console.log('[2:oncomplete]', _pincode);
      }
    });

  // third field
  $('[name=pincode-3]')
    .on('focus', function(event) {
      if ( ! ($first.val().trim() !== '' &&
          $second.val().trim() !== '')) {
        // prevent default
        event.preventDefault();

        // reset pincode
        _pincode = [];

        // handle each field
        $inputs
          .each(function() {
          // clear each field
          $(this).val('');
        });

        // focus to first field
        $first.focus();
      }

      ! debug || console.log('[3:focus]', _pincode);
    })
    .inputmask({
      oncomplete: function() {
        // add third character
        _pincode.push($(this).val());

        // focus to fourth field
        $('[name=pincode-4]').focus();

        ! debug || console.log('[3:oncomplete]', _pincode);
      }
    });

  // fourth field
  $('[name=pincode-4]')
    .on('focus', function(event) {
      if ( ! ($first.val().trim() !== '' &&
          $second.val().trim() !== '' &&
          $third.val().trim() !== '')) {
        // prevent default
        event.preventDefault();

        // reset pincode
        _pincode = [];

        // handle each field
        $inputs
          .each(function() {
          // clear each field
          $(this).val('');
        });

        // focus to first field
        $first.focus();
      }

      ! debug || console.log('[4:focus]', _pincode);
    })
    .inputmask({
      oncomplete: function() {
        // add fo fourth character
        _pincode.push($(this).val());

        // focus to fifth field
        $('[name=pincode-5]').focus();

        ! debug || console.log('[4:oncomplete]', _pincode);
      }
    });

  // fifth field
  $('[name=pincode-5]')
    .on('focus', function(event) {
      if ( ! ($first.val().trim() !== '' &&
          $second.val().trim() !== '' &&
          $third.val().trim() !== '' &&
          $fourth.val().trim() !== '')) {
        // prevent default
        event.preventDefault();

        // reset pincode
        _pincode = [];

        // handle each field
        $inputs
          .each(function() {
          // clear each field
          $(this).val('');
        });

        // focus to first field
        $first.focus();
      }

      ! debug || console.log('[5:focus]', _pincode);
    })
    .inputmask({
      oncomplete: function() {
        // add fifth character
        _pincode.push($(this).val());

        // focus to sixth field
        $('[name=pincode-6]').focus();

        ! debug || console.log('[5:oncomplete]', _pincode);
      }
    });

  // sixth field
  $('[name=pincode-6]')
    .on('focus', function(event) {
      if ( ! ($first.val().trim() !== '' &&
          $second.val().trim() !== '' &&
          $third.val().trim() !== '' &&
          $fourth.val().trim() !== '' &&
          $fifth.val().trim() !== '')) {
        // prevent default
        event.preventDefault();

        // reset pincode
        _pincode = [];

        // handle each field
        $inputs
          .each(function() {
          // clear each field
          $(this).val('');
        });

        // focus to first field
        $first.focus();
      }

      ! debug || console.log('[6:focus]', _pincode);
    })
    .inputmask({
      oncomplete: function() {
        // add sixth character
        _pincode.push($(this).val());

        // pin length not equal to six characters
        if (_pincode.length !== 6) {
          // reset pin
          _pincode = [];

          // handle each field
          $inputs
            .each(function() {
              // clear each field
              $(this).val('');
            });

          // focus to first field
          $('[name=pincode-1]').focus();
        } else {
          // handle each field
          $inputs.each(function() {
            // disable field
            $(this).prop('disabled', true);
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
            url: API_USUARIOS + "2fa",
            dataType: "json",
            data: {
              'code': _pincode.join(''),
              'secret': $("#secret").html().replace(/\s/g, '')
            }
          })
          .done(function(data) {
            try {
              ! debug || console.log('data', data);

              if (data.status === 1) {
                $group.addClass('form__group--success');
                $button.removeAttr('disabled');
                twoFactorCheck = true;
              }

              if (data.status === 0) {
                $group.addClass('form__group--error');
                setTimeout(reset,2000);
              }
            } catch (err) {

            }
          })
          .fail(function(jqXHR, textStatus, errorThrown) {
            $group.removeClass('form__group--error');
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + " " + jqXHR.statusText);
            }
          })
        }

        ! debug || console.log('[6:oncomplete]', _pincode);
      }
    });
});

$("#save2fa").click(
    function(e){
    e.preventDefault()
    if(twoFactorCheck){
        $.ajax({
            type: "POST",
            url: API + "save2fa",
            dataType: "json",
            data: {
              'secret': $("#secret").html().replace(/\s/g, '')
            }
          })
          .done(function(data) {
              if (data.status === 1) {
                $("#2fa-check").prop('checked', true);
                $('#2fa-modal').modal('hide');
                reset2fa();
              }

              if (data.status === 0) {
                  swal(2, response.exception);
                  reset2fa();
              }
          })
          .fail(function(jqXHR) {
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + " " + jqXHR.statusText);
            }
          })
    }
    else{
        swal(2, 'Código de autenticación incorrecto');
    }
});

$("#2fa-modal").on("hidden.bs.modal", function () {
    reset2fa();
});

function reset2fa(){
    var $form = $('#form');
    var $group = $form.find('.form__pincode');
    var $inputs = $group.find(':input');
    var $first = $form.find('[name=pincode-1]');
    var $button = $form.find('.button-p--primary');

    $inputs.each(function() {
      // clear all fields
      $(this).val('');

      // enable all fields
      $(this).prop('disabled', false);
    });

    // remove response status class
    $group.removeClass('form__group--success form__group--error');

    // disable submit button
    $button.attr('disabled', true);

    // focus to first field
    $first.focus();
}
