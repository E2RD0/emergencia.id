<?php
require_once '../templates/templateUser.php';
template::headerLogin('Restablecer contraseña');
?>

<header class="header-login">
    <img class="" src="../../public/images/for-light-bg.svg" alt="Emergencia.id">
</header>

<main class="container my-5">
    <div class="row">
        <div class="col-10 col-md-8 mx-auto text-center">
            <img class="img-fluid" width="400" src="../../public/images/contrasenaReestablecida.svg" alt="Corazón imagen">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto mt-4 text-center">
            <p class="text-title">Contraseña reestablecida</p>
            <div class="col-12 col-md-10 mx-auto">
                <p class="text-regular mt-3">La contraseña se ha restablecido exitósamente. Ya puedes iniciar sesión con la nueva contraseña.</p>
            </div>
            <div class="mr-3 mr-sm-4">
                <p class="text-regular">Ir al <a href="login.php" class="text-link font-size-regular">inicio de sesión</a></p>
            </div>
        </div>
    </div>
</main>


<?php
template::footerLogin();
?>
