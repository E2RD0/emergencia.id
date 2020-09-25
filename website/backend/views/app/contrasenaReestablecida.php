<?php
require_once '../templates/templateUser.php';
template::headerLogin('Reset password');
?>

<header class="header-login">
    <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
</header>

<main class="container my-5">
    <div class="row">
        <div class="col-10 col-md-8 mx-auto text-center">
            <img class="img-fluid" width="400" src="<?= HOME_PATH ?>resources/images/contrasenaReestablecida.svg" alt="heart image">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto mt-4 text-center">
            <p class="text-title">Your password has been reset</p>
            <div class="col-12 col-md-10 mx-auto">
                <p class="text-regular mt-3">The password has been successfully reset. You can now log in with the new password.</p>
            </div>
            <div class="mr-3 mr-sm-4">
                <p class="text-regular">Go to <a href="login.php" class="text-link font-size-regular">log in</a></p>
            </div>
        </div>
    </div>
</main>


<?php
template::footerLogin();
?>
