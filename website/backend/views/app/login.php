<?php
require_once 'templates/templateUser.php';
template::headerLogin('Inicio de sesión');
?>
<div class="container-login">
    <header class="header-login">
        <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
    </header>
    <div class="container-login-form">
    <main class="container">
        <div class="container-login-form-inner mx-auto mx-md-0">
            <h1 class="text-main text-title">Iniciar sesión</h1>
            <p class="text-regular mt-2 mb-4">Ingresa tus credenciales para continuar.</p>

            <form id="login-form" action="" method="post">

                <label class="text-help" for="inputEmail">Correo electrónico</label>
                <div class="input-group mb-4">
                    <input class="textfield" type="email" class="form-control" id="inputEmail" name="email" aria-describedby="basic-addon3" required>
                    <div class="line"></div>
                    <p class="form-error-label" id="errorEmail"></p>
                </div>
                <label class="text-help" for="inputContraseña">Contraseña</label>
                <div class="input-group mb-4">
                    <input class="textfield" type="password" class="form-control" id="inputContraseña" required name="password" aria-describedby="basic-addon3">
                    <div class="line"></div>
                    <p class="form-error-label" id="errorContraseña"></p>
                </div>
                <div class="row mb-md-4 mb-2">
                    <!--Para computadora-->
                    <div class="col-12 col-md-8 text-center text-lg-right d-none d-sm-block">
                        <a  href="<?= HOME_PATH ?>app/user/recoverpassword" class="text-help text-link float-left">¿Olvidaste tu contraseña?</a>
                    </div>

                    <!--Para Dispositivos moviles-->
                    <div class="col-12 col-md-8 text-center text-lg-right d-block d-sm-none">
                        <a href="recuperarContrasena.php" class="text-help text-link ">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="col-12 col-md-4 text-sm-right text-center my-4 my-md-2">
                        <button type="submit" class="button" id="login-submit">Acceder</button>
                    </div>
                </div>
            </form>

            <div class="col-12 text-center">
                <p class="text-help">Aún no tengo una cuenta - <a class="text-link text-main" href="<?= HOME_PATH ?>app/user/signup">Registrarme</a></p>
            </div>
        </div>
    </main>
    </div>
</div>

<?php
template::footerLogin('login.js');
?>
