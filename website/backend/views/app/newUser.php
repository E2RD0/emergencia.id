<?php
require_once 'templates/templateUser.php';
template::headerLogin('Register');
?>

<header class="header-login">
    <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
</header>

<main class="container-fluid">
    <div class="">
        <div class="w-100 d-none d-md-flex justify-content-center nav" role="tablist">
            <div class="d-flex">
                <div class="mx-3">
                    <h5 class="d-flex">
                        <!-- If ternario, para validad el active del stepper -->
                        <span id="step1" class="badge badge-pill mr-3 active-stepper"><span class="">1</span></span><span class="d-none d-sm-none d-md-block text-dark">Añade tu información</span>
                    </h5>
                </div>
                <div class="mx-3">
                    <h5 class="d-flex">
                        <span id="step2" class="badge badge-pill mr-3 inactive-stepper"><span class="">2</span></span><span class="d-none d-sm-none d-md-block text-secondary">Completa tu perfil médico</span>
                    </h5>
                </div>
                <div class="mx-3">
                    <h5 class="d-flex">
                        <span class="badge badge-pill mr-3 inactive-stepper"><span class="">3</span></span><span class="d-none d-sm-none d-md-block text-secondary">Revisión</span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="tab-content">

            <div id="stepOne" class="container mt-5 tab-pane active" role="tabpanel">
                <div class="container-login-form-inner mx-auto text-center">
                    <h1 class="text-main text-title mb-1">¿Cómo te llamas?</h1>
                    <p class="mt-2 mb-4">Ingresa tu nombre.</p>
                    <div id="names-form">
                        <label class="text-help float-left" for="inputNombres">Nombres</label>
                        <input id="inputNombres" class="textfield" type="text" aria-describedby="basic-addon3" required>
                        <p class="form-error-label" id="errorNombres"></p>
                        <label class="text-help float-left mt-2" for="inputApellidos">Apellidos</label>
                        <input id="inputApellidos" class="textfield" type="text" aria-describedby="basic-addon3" required>
                        <p class="form-error-label" id="errorApellidos"></p>
                        <button id="names-submit" class="button float-right mt-3 btn_redirect_white">Continuar</button>
                    </div>
                </div>
            </div>

            <div id="stepTwo" class="container mt-5 tab-pane" role="tabpanel">
                <div class="container-login-form-inner mx-auto text-center">
                    <h1 class="text-main text-title mb-1">Ingresa tu número de teléfono</h1>
                    <p class="mt-2 mb-4">Servirá por si pierdes acceso a tu correo electrónico y como un medio alternativo para iniciar sesión.</p>
                    <div id="tel-form" class="clearfix mb-3">
                        <label class="text-help float-left" for="inputTeléfono">Teléfono</label>
                        <input id="inputTeléfono" class="textfield" type="text" aria-describedby="basic-addon3">
                        <p class="form-error-label" id="errorApellidos"></p>
                        <button id="go-back-1"class="button button--white float-left mt-3">Regresar</button>
                        <button id="tel-submit" class="button float-right mt-3">Continuar</button>
                    </div>
                    <a href="#" id="tel-omitir" class="text-help text-link font-size-regular">Omitir</a>
                </div>
            </div>

        </div>

    </div>
</main>

<!--<footer class="col-12 fixed-bottom bg-back bg-h z-back d-none d-md-block"></footer>-->

<?php
template::footerLogin('newUser.js');
?>
