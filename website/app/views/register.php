<?php
require_once '../templates/templateUser.php';
template::headerLogin('Register');
?>

<header class="header-login">
    <img class="" src="../../public/images/for-light-bg.svg" alt="Emergencia.id">
</header>

<main class="container-fluid">
    <div class="">
        <div class="w-100 d-none d-md-flex justify-content-center">
            <div class="d-flex">
                <div class="mx-3">
                    <h5 class="d-flex">
                        <!-- If ternario, para validad el active del stepper -->
                        <span class="badge badge-pill mr-3 <?php echo $res = ($_GET['step'] == 1) ? "active-stepper" : "inactive-stepper"; ?>"><span class="">1</span></span><span class="d-none d-sm-none d-md-block text-dark">Añade tu información</span>
                    </h5>
                </div>
                <div class="mx-3">
                    <h5 class="d-flex">
                        <span class="badge badge-pill mr-3 <?php echo $res = ($_GET['step'] == 2) ? "active-stepper" : "inactive-stepper"; ?>"><span class="">2</span></span><span class="d-none d-sm-none d-md-block text-secondary">Completa tu perfil médico</span>
                    </h5>
                </div>
                <div class="mx-3">
                    <h5 class="d-flex">
                        <span class="badge badge-pill mr-3 <?php echo $res = ($_GET['step'] == 3) ? "active-stepper" : "inactive-stepper"; ?>"><span class="">3</span></span><span class="d-none d-sm-none d-md-block text-secondary">Revisión</span>
                    </h5>
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
            <div id="stepOne" class="container mt-5">
                <div class="container-login-form-inner mx-auto text-center">
                    <h1 class="text-main text-title mb-1">¿Cómo te llamas?</h1>
                    <p class="mt-2 mb-4">Ingresa tu nombre.</p>
                    <form>
                        <label class="text-help float-left" for="email">Nombres</label>
                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                        <label class="text-help float-left mt-2" for="email">Apellidos</label>
                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                        <a href="register.php?step=2" type="submit" class="button float-right mt-3 btn_redirect_white">Continuar</a>
                    </form>
                </div>
            </div>
        <?php
        } else if ($_GET['step'] == 2) {
        ?>
            <div id="stepTwo" class="container mt-5">
                <div class="container-login-form-inner mx-auto text-center">
                    <h1 class="text-main text-title mb-1">Ingresa tu número de teléfono</h1>
                    <p class="mt-2 mb-4">Servirá por si pierdes acceso a tu correo electrónico y como un medio alternativo para iniciar sesión.</p>
                    <form class="clearfix mb-3">
                        <label class="text-help float-left" for="email">Teléfono</label>
                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                        <a href="register.php?step=1" type="submit" class="button button--white float-left mt-3">Regresar</a>
                        <a href="register.php?step=2" type="submit" class="button float-right mt-3">Continuar</a>
                    </form>
                    <a href="#" class="text-help text-link font-size-regular">Omitir</a>
                </div>
            </div>
        <?php
        } else if ($_GET['step'] == 3) {
        ?>
            <!-- Codigo HTML para el stepper 3-->
        <?php
        }
        ?>

    </div>
</main>

<!--<footer class="col-12 fixed-bottom bg-back bg-h z-back d-none d-md-block"></footer>-->

<?php
template::footerLogin();
?>