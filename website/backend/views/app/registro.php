<?php
require_once 'templates/templateUser.php';
template::headerLogin('Register');
?>
<div class="container-login">
    <header class="header-login">
        <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
    </header>
    <div class="container-login-form">
    <main class="container">
        <div class="container-login-form-inner mx-auto mx-md-0">
            <h1 class="text-main text-title">Sign up</h1>
            <p class="text-regular mt-2 mb-4">Create an account.</p>

            <form id="register-form" action="" method="post">
                <label class="text-help" for="inputEmail">Email</label>
                <div class="input-group mb-4">
                    <input class="textfield" type="email" class="form-control" id="inputEmail" name="email" aria-describedby="basic-addon3" required>
                    <div class="line"></div>
                    <p class="form-error-label" id="errorEmail"></p>
                </div>
                <label class="text-help" for="inputContraseña">Password</label>
                <div class="input-group mb-4">
                    <input class="textfield" type="password" class="form-control" id="inputContraseña" required name="password" aria-describedby="basic-addon3" minlength=6>
                    <div class="line"></div>
                    <p class="form-error-label" id="errorContraseña"></p>
                </div>
                <div class="row mb-md-4 mb-2">
                    <div class="col-12 text-sm-right text-center mb-2">
                        <button type="submit" class="button" id="register-submit">Continue</button>
                    </div>
                </div>
            </form>

            <div class="col-12 text-center">
                <p class="text-help">I already have an account - <a class="text-link text-main" href="<?= HOME_PATH ?>app/user/login">Log in</a></p>
            </div>
        </div>
    </main>
    </div>
</div>

<?php
template::footerLogin('signup.js');
?>
