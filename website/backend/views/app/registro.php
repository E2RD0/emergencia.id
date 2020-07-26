<?php
require_once 'templates/templateUser.php';
template::headerLogin('Registro');
?>
<div class="container-login">
    <header class="header-login">
        <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
    </header>
    <div class="container-login-form">
    <main class="container">
        <div class="container-login-form-inner mx-auto mx-md-0">
            <h1 class="text-main text-title">Regístrate</h1>
            <p class="text-regular mt-2 mb-4">Crea una nueva cuenta.</p>

            <form action="">
                <label class="text-help" for="email">Correo electrónico</label>
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
                    <div class="col-12 text-sm-right text-center mb-2">
                        <button type="button" class="button" onclick="location.href='register.php?step=1'">Continuar</button>
                    </div>
                </div>
            </form>

            <div class="col-12 text-center">
                <p class="text-help">Ya tengo una cuenta - <a class="text-link text-main" href="<?= HOME_PATH ?>app/user/login">Iniciar Sesión</a></p>
            </div>
        </div>
    </main>
    </div>
</div>

<?php
template::footerLogin();
?>
