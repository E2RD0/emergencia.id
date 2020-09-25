<?php
require_once '../templates/templateUser.php';
template::headerLogin('Reset password');
?>
<div class="container-login container-login--recover">
    <header class="header-login">
        <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
    </header>
    <div class="container-login-form">
    <main class="container">
        <div class="container-login-form-inner mx-auto mx-md-0">
            <h1 class="text-main text-title">Reset password</h1>
            <p class="text-regular mt-2 mb-4">Enter your username.</p>

            <form action="">
                <label class="text-help" for="email">Email or Phone number</label>
                <div class="input-group mb-4">
                    <input class="textfield" type="email" class="form-control" id="email" aria-describedby="basic-addon3">
                    <div class="line"></div>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <div class="mr-3 mr-sm-4">
                        <a href="login.php" class="text-help text-link font-size-regular align-middle">Go to the login</a>
                    </div>
                    <div class="">
                        <button type="button" class="button" onclick="location.href='ingresarCodigo.php'">Continue</button>
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
