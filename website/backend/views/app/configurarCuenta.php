<?php
require_once 'templates/templateUser.php';
template::headerSite('Configuración de la cuenta');
?>

<main class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 col-xl-5 mx-auto mt-md-5 mt-2">
            <div class="col-11 mx-auto">
                <h1 class="text-regular">Configuración de la cuenta</h1>
                <p class="text-help text-settings-help text-uppercase">Cuenta</p>
            </div>
            <form class="col-12 bg-white rounded" method="post" action="" id="account-form">
                <div class="d-flex justify-content-center" id="spinnerSettings">
                        <div class="spinner-grow" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputEmail">Correo electrónico</label>
                            <div class="input-group mb-4">
                                <input name="email" class="textfield" type="email" class="form-control" id="inputEmail" aria-describedby="basic-addon3">
                                <div class="line"></div>
                                <p class="form-error-label" id="errorEmail"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputTeléfono">Número de teléfono</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="text" class="form-control" id="inputTeléfono" name="tel" aria-describedby="basic-addon3">
                                <div class="line"></div>
                                <p class="form-error-label" id="errorTeléfono"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-4">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="first-name">Perfil médico del propietario</label>
                            <div class="input-group mb-4">
                                <select class="textfield" id="inputPerfil" name="perfil">
                                <option selected value="">Seleccionar</option>
                              </select>
                              <p class="form-error-label" id="errorPerfil"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button id="account-submit" class="text-settings-link-on float-right m-3" type="submit" name="button">Guardar</button>
                    </div>
                </div>
            </form>
            <div class="col-11 mx-auto mt-4">
                <p class="text-help text-settings-help text-uppercase">Cambiar contraseña</p>
            </div>
            <form class="col-12 bg-white rounded" method="post" action="" id="password-form">
                <div class="row">
                    <div class="col-12 col-md-6 mt-4 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputContraseña">Ingresa tu contraseña actual</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="password" class="form-control" id="inputContraseña" name="password" aria-describedby="basic-addon3">
                                <div class="line"></div>
                                <p class="form-error-label" id="errorContraseña"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-md-4 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputNuevaContraseña">Ingresa tu nueva contraseña</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="password" class="form-control" id="inputNuevaContraseña" name="newPassword" aria-describedby="basic-addon3">
                                <div class="line"></div>
                                <p class="form-error-label" id="errorNuevaContraseña"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mt-2 ml-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputNewPasswordR">Ingresa de nuevo la contraseña</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="password" class="form-control" id="inputNewPasswordR" name="newPasswordR" aria-describedby="basic-addon3">
                                <div class="line"></div>
                                <p class="form-error-label" id="errorNewPasswordR"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button id="password-submit" class="text-settings-link-on float-right m-3" type="submit" name="button">Guardar</button>
                    </div>
                </div>
            </form>
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
template::footerSite('accountSettings.js');
?>
