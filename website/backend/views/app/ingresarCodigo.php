<?php
require_once '../templates/templateUser.php';
template::headerLogin('Restablecer contraseña');
?>
<div class="container-login container-login--recover">
    <header class="header-login">
        <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
    </header>
    <div class="container-login-form">
        <main class="container">
            <div class="container-login-form-inner mx-auto mx-md-0">
                <h1 class="text-main text-title">Restablecer contraseña</h1>
                <p class="text-regular mt-2 mb-4">Revisa tu correo electrónico e ingresa el código de verificación.</p>

                <form action="">
                    <label class="text-help" for="code">Código de verificación</label>
                    <div class="input-group mb-4">
                        <input class="textfield" type="text" class="form-control" id="code" aria-describedby="basic-addon3">
                        <div class="line"></div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="mr-3 mr-sm-4">
                            <a href="login.php" class="text-help text-link font-size-regular align-middle">Ir al inicio de sesión</a>
                        </div>
                        <div class="">
                            <button type="button" class="button" onclick="location.href='cambiarContrasena.php'">Continuar</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php
template::footerLogin();
?>
