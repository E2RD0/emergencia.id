<?php
require_once 'templates/templateUser.php';
template::headerSite('Configuración de la cuenta');
?>

<main class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 col-xl-5 mx-auto mt-md-5 mt-2">
            <div class="col-11 mx-auto">
                <h1 class="text-regular">Account settings</h1>
                <p class="text-help text-settings-help text-uppercase">Account</p>
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
                            <label class="text-help text-settings-tfname" for="inputEmail">E-mail</label>
                            <div class="input-group mb-4">
                                <input name="email" class="textfield" type="email" class="form-control" id="inputEmail" aria-describedby="basic-addon3">
                                <div class="line"></div>
                                <p class="form-error-label" id="errorEmail"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputTeléfono">Phone number</label>
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
                            <label class="text-help text-settings-tfname" for="first-name">Owner's medical profile</label>
                            <div class="input-group mb-4">
                                <select class="textfield" id="inputPerfil" name="perfil">
                                <option selected value="">Select</option>
                              </select>
                              <p class="form-error-label" id="errorPerfil"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button id="account-submit" class="text-settings-link-on float-right m-3" type="submit" name="button">Save</button>
                    </div>
                </div>
            </form>
            <div class="col-11 mx-auto mt-4">
                <p class="text-help text-settings-help text-uppercase">Change Password</p>
            </div>
            <form class="col-12 bg-white rounded" method="post" action="" id="password-form">
                <div class="row">
                    <div class="col-12 col-md-6 mt-4 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputContraseña">Enter your current password</label>
                            <div class="input-group mb-4">
                                <input class="textfield" type="password" class="form-control" id="inputContraseña" name="password" aria-describedby="basic-addon3">
                                <div class="line"></div>
                                <p class="form-error-label" id="errorContraseña"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-md-4 mt-2 mx-auto">
                        <div class="col-12">
                            <label class="text-help text-settings-tfname" for="inputNuevaContraseña">Enter your new password</label>
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
                            <label class="text-help text-settings-tfname" for="inputNewPasswordR">Re-enter password</label>
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
                        <button id="password-submit" class="text-settings-link-on float-right m-3" type="submit" name="button">Save</button>
                    </div>
                </div>
            </form>
            <div class="col-11 mx-auto mt-4">
                <p class="text-settings-help text-uppercase text-danger">Delete account</p>
            </div>
            <div class="col-12 bg-white rounded">
                <div class="row mb-md-5 mb-3">
                    <div class="col-8 my-4 mx-auto">
                        <div class="col-11">
                            <p class="text-help text-settings-da mb-0">Once you delete your account, it cannot be recovered.</p>
                        </div>
                    </div>
                    <div class="col-4 my-4 px-auto my-auto">
                            <button onclick="deleteUser()" class="text-settings-link-on text-danger mb-0 text-md-right text-center">Delete account</button>
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
