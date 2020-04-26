<?php
require_once '../templates/templateUser.php';
template::headerLogin('Register');
?>

<header class="col-12 text-center text-md-left">
    <img class="mt-5 mx-5 mb-md-5 mb-0" src="../../public/images/for-light-bg.svg" alt="Emergencia.id">
</header>

<main class="col-12">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 col-sm-1">
                <div>
                    <h5 class="d-flex"><span class="badge badge-pill mr-3
                    <?php
                    if ($_GET['step'] == 1) {
                        echo 'badge-primary text-white';
                    } else {
                        echo 'carrousel_bg_inactive';
                    } ?>"><a href="register.php?step=1" class="
                    <?php
                    if ($_GET['step'] == 1) {
                        echo 'text-white';
                    } else {
                        echo 'text-secondary';
                    }
                    ?>
                    ">1</a></span><span class="d-none d-sm-none d-md-block
                    <?php
                    if ($_GET['step'] == 1) {
                        echo 'text-dark';
                    } else {
                        echo 'text-secondary';
                    }
                    ?>
                    ">Añade tu información</span></h5>
                </div>
            </div>
            <div class="col-lg-4 col-sm-1 h-100">
                <div class="justify-content-center h-100">
                    <h5 class="d-flex"><span class="badge badge-pill mr-3
                    <?php
                    if ($_GET['step'] == 2) {
                        echo 'badge-primary text-white';
                    } else {
                        echo 'carrousel_bg_inactive';
                    } ?>"><a href="register.php?step=2" class="
                    <?php
                    if ($_GET['step'] == 2) {
                        echo 'text-white';
                    } else {
                        echo 'text-secondary';
                    }
                    ?>
                    ">2</a></span><span class="d-none d-sm-none d-md-block
                    <?php
                    if ($_GET['step'] == 2) {
                        echo 'text-dark';
                    } else {
                        echo 'text-secondary';
                    }
                    ?>
                    ">Completa tu perfil médico</span></h5>
                </div>
            </div>
            <div class="col-lg-4 col-sm-1">
                <div class="">
                <h5 class="d-flex"><span class="badge badge-pill mr-3
                    <?php
                    if ($_GET['step'] == 3) {
                        echo 'badge-primary text-white';
                    } else {
                        echo 'carrousel_bg_inactive';
                    } ?>"><a href="register.php?step=3" class="
                    <?php
                    if ($_GET['step'] == 3) {
                        echo 'text-white';
                    } else {
                        echo 'text-secondary';
                    }
                    ?>
                    ">3</a></span><span class="d-none d-sm-none d-md-block
                    <?php
                    if ($_GET['step'] == 3) {
                        echo 'text-dark';
                    } else {
                        echo 'text-secondary';
                    }
                    ?>
                    ">Revisión</span></h5>
                </div>
            </div>
        </div>

        <?php
        #Valida si existe la variable step en la URL
        if (!isset($_GET['step'])) {
            #Si no existe step se igualara a 1 para registrarse desde la etapa 1
            $_GET['step'] = 1;
        }
        #Validar en la etapa que se rellenan los datos
        if ($_GET['step'] == 1) {
        ?>
            <div id="stepOne">
                <div class="text-center">
                    <h1 class="text-main text-title mb-1 mt-5">¿Cómo te llamas?</h1>
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <p class="">Ingresa tu nombre</p>
                            <label class="text-help float-left" for="email">Nombres</label>
                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                            <label class="text-help float-left mt-2" for="email">Apellidos</label>
                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                            <a href="register.php?step=2" type="submit" class="button float-right mt-3 btn_redirect_white">Continuar</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else if ($_GET['step'] == 2) {
        ?>
            <div id="stepTwo">
                <div class="text-center">
                    <h1 class="text-main text-title mb-1 mt-5">Ingrese tu número de teléfono</h1>
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <p class="">Servirá por si pierdes acceso a tu correo electrónico y como un medio alternativo para iniciar sesión</p>
                            <label class="text-help float-left" for="email">Teléfono</label>
                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                            <a href="register.php?step=1" class="text-help text-link d-block d-sm-block d-md-none float-left mt-4 text-dark">Regresar</a>
                            <a href="register.php?step=1" class="button_return text-help text-link float-left mt-4 d-none d-sm-none d-md-block">Regresar</a>
                            <a href="register.php?step=2" type="submit" class="button float-right mt-3 btn_redirect_white">Continuar</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else if ($_GET['step'] == 3) {
        ?>

        <?php
        }
        ?>

    </div>
</main>

<footer class="col-12 fixed-bottom bg-back bg-h z-back d-none d-md-block">

</footer>

<?php
template::footerLogin();
?>