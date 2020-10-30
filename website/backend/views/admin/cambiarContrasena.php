<?php
require_once 'templates/templateUser.php';
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
                <p class="text-regular mt-2 mb-4">Cambia tu contraseña</p>

                <form autocomplete="off" action="" id="form-newPassword">
                    <label class="text-help" for="inputNuevaContraseña">Nueva contraseña</label>
                    <div class="input-group mb-4">
                        <input name="newPassword" id="inputNuevaContraseña" class="textfield" type="password" class="form-control" aria-describedby="basic-addon3">
                        <div class="line"></div>
                        <p class="form-error-label" id="errorNuevaContraseña"></p>
                    </div>
                    <label class="text-help" for="inputNewPasswordR">Repite la contraseña</label>
                    <div class="input-group mb-4">
                        <input name="newPasswordR" id="inputNewPasswordR" class="textfield" type="password" class="form-control" aria-describedby="basic-addon3">
                        <div class="line"></div>
                        <p class="form-error-label" id="errorNewPasswordR"></p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="mr-3 mr-sm-4">
                            <a href="login.php" class="text-help text-link font-size-regular align-middle">Ir al inicio de sesión</a>
                        </div>
                        <div class="">
                            <button class="button" type="submit" id="password-submit">Continuar</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php
template::footerLogin('recoverPassword.js');
?>
