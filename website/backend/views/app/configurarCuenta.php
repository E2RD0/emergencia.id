<?php
require_once '../templates/templateUser.php';
template::headerSite('Configuración de la cuenta');
?>

<main class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 col-xl-5 mx-auto mt-md-5 mt-2">
            <div class="col-11 mx-auto">
                <h1 class="text-regular">Configuración de la cuenta</h1>
                <p class="text-help text-settings-help text-uppercase">Cuenta</p>
            </div>
            <div class="col-12 bg-white rounded">
                <div class="row">
                    <div class="col-12 col-md-6 mt-4 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="first-name">Primer nombre</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="text" class="form-control" id="first-name" aria-describedby="basic-addon3">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-md-4 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="second-name">Segundo nombre</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="text" class="form-control" id="second-name" aria-describedby="basic-addon3">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="email">Correo electrónico</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="email" class="form-control" id="email" aria-describedby="basic-addon3">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="number">Número de teléfono</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="text" class="form-control" id="number" aria-describedby="basic-addon3">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="text-settings-link-on">
                            <p class="text-right mr-3">Guardar</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-11 mx-auto mt-4">
                <p class="text-help text-settings-help text-uppercase">Cambiar contraseña</p>
            </div>
            <div class="col-12 bg-white rounded">
                <div class="row">
                    <div class="col-12 col-md-6 mt-4 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="first-name">Ingresa tu contraseña actual</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="text" class="form-control" id="first-name" aria-describedby="basic-addon3">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-md-4 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="second-name">Ingresa tu nueva contraseña</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="text" class="form-control" id="second-name" aria-describedby="basic-addon3">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-2 ml-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="number">Ingresa de nuevo la contraseña</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="text" class="form-control" id="number" aria-describedby="basic-addon3">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="text-settings-link-on">
                            <p class="text-right mr-3">Guardar</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-11 mx-auto mt-4">
                <p class="text-settings-help text-uppercase text-danger">Eliminar cuenta</p>
            </div>
            <div class="col-12 bg-white rounded">
                <div class="row mb-md-5 mb-3">
                    <div class="col-8 my-4 mx-auto">
                        <div class="col-11">
                            <p class="text-help text-settings-da mb-0">Una vez elimines tu cuenta, no podrá ser recuperada.</p>
                        </div>
                    </div>
                    <div class="col-4 my-4 px-auto my-auto">
                        <a href="#" class="text-settings-link-on text-danger">
                            <p class="mb-0 text-md-right text-center">Eliminar cuenta</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
template::footerSite();
?>
