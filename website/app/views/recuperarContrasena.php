<?php
require_once '../templates/templateUser.php';
template::headerLogin('Restablecer contraseña');
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
                        <h1 class="text-main text-title mb-1">Restablecer contraseña</h1>
                        <p class="text-regular mb-4">Ingresa tu usuario.</p>
                        <label class="text-help" for="email">Correo electrónico o teléfono</label>
                        <div class="input-group mb-4">
                            <input class="textfield" type="email" class="form-control" id="email" aria-describedby="basic-addon3">
                            <div class="line"></div>
                        </div>
                        <div class="row mb-md-4 mb-2">
                            <div class="col-12 col-md-8 text-center text-lg-right mt-4">
                                <a href="login.php" class="text-help text-link align-middle">Ir al inicio de sesión</a>
                            </div>
                            <div class="col-12 col-md-4 text-md-right text-center my-4 my-md-2">
                                <button type="button" class="button" onclick="location.href='ingresarCodigo.php'">Continuar</button>
                            </div>
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
                <img class="img-fluid img-nmt img-s" src="../../public/images/recoverPassword.svg" alt="Imagen de restablecer contraseña">
            </div>
        </div>
    </div>
</footer>

<?php
template::footerLogin();
?>