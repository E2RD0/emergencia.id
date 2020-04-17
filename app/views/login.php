<?php
require_once '../templates/templateUser.php';
template::headerLogin('Inicio de sesión');
?>

<header class="col-12 text-center text-md-left">
    <img class="mt-5 mx-5 mb-md-5 mb-0" src="../../public/images/for-light-bg.svg" alt="Emergencia.id">
</header>
<main class="col-12">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="row mt-md-0">
                <div class="col-10 col-md-8 mx-auto">
                    <form action="">
                        <h1 class="text-main text-title mb-1">Iniciar sesión</h1>
                        <p class="text-regular mb-4">Ingresa tus credenciales para continuar.</p>
                        <label class="text-help" for="email">Correo electrónico o teléfono</label>
                        <div class="input-group mb-4">
                            <input class="textfield" type="email" class="form-control" id="email" aria-describedby="basic-addon3">
                            <div class="line"></div>
                        </div>
                        <label class="text-help" for="pass">Contraseña</label>
                        <div class="input-group mb-4">
                            <input class="textfield" type="password" class="form-control" id="pass" aria-describedby="basic-addon3">
                            <div class="line"></div>
                        </div>
                        <div class="row mb-md-4 mb-2">
                            <div class="col-12 col-md-8">
                                <a href="#" class="text-help text-link">¿Olvidaste tu contraseña?</a>
                            </div>
                            <div class="col-12 col-md-4 text-md-right text-center my-4 my-md-2">
                                <button type="button" class="button">Acceder</button>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <p class="text-help">Aún no tengo una cuenta - <a class="text-link text-main" href="#">Registrarme</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="col-12 fixed-bottom bg-back bg-h z-back d-none d-md-block">
    <div class="row">
        <div class="col-12 col-xl-6"></div>
        <div class="">
            <div class="mt-5"></div>
        </div>
        <div class="col-12 col-xl-6">
            <div class="text-center d-none d-md-block">
                <img class="img-fluid img-nmt img-s" src="../../public/images/object.svg" alt="Imagen de salud">
            </div>
        </div>
    </div>
</footer>

<?php
template::footerLogin();
?>