<?php
require_once 'templates/templateUser.php';
template::headerLogin('Nuevo usuario');
?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<div class="container-login" id="app">
    <header class="header-login">
        <img class="" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" alt="Emergencia.id">
    </header>
    <div class="container-login-form">
        <main class="container">
            <div class="container-login-form-inner mx-auto mx-md-0">
                <h1 class="text-main text-title">Registrar el primer usuario</h1>
                <p class="text-regular mt-2 mb-4">Ingresa las credenciales para continuar.</p>

                <div>
                    <label class="text-help" for="inputEmail">Nombre</label>
                    <div class="input-group mb-4">
                        <input class="textfield" v-model="newUser.name" type="text" class="form-control" id="inputEmail" name="name"
                            aria-describedby="basic-addon3" required>
                        <div class="line"></div>
                        <p class="form-error-label" id="errorEmail"></p>
                    </div>
                    <label class="text-help" for="inputEmail">Apellido</label>
                    <div class="input-group mb-4">
                        <input class="textfield" v-model="newUser.lastname" type="text" class="form-control" id="inputEmail" name="lastname"
                            aria-describedby="basic-addon3" required>
                        <div class="line"></div>
                        <p class="form-error-label" id="errorEmail"></p>
                    </div>
                    <label class="text-help" for="inputEmail">Email</label>
                    <div class="input-group mb-4">
                        <input class="textfield" v-model="newUser.email" type="email" class="form-control" id="inputEmail" name="email"
                            aria-describedby="basic-addon3" required>
                        <div class="line"></div>
                        <p class="form-error-label" id="errorEmail"></p>
                    </div>
                    <label class="text-help" for="inputEmail">Telefono</label>
                    <div class="input-group mb-4">
                        <input class="textfield" v-model="newUser.telephone" type="text" class="form-control" id="inputEmail" name="telephone"
                            aria-describedby="basic-addon3" required>
                        <div class="line"></div>
                        <p class="form-error-label" id="errorEmail"></p>
                    </div>
                    <label class="text-help" for="inputContraseña">Contraseña</label>
                    <div class="input-group mb-4">
                        <input class="textfield" v-model="newUser.password" type="password" class="form-control" id="inputContraseña" required
                            name="password" aria-describedby="basic-addon3">
                        <div class="line"></div>
                        <p class="form-error-label" id="errorContraseña"></p>
                    </div>
                    <div class="row mb-md-4 mb-2">
                        <div class="col-12 col-md-4 text-sm-right text-center my-4 my-md-2">
                            <button type="submit" @click="registerNewUser" class="button" id="login-submit">Registrarse</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<div class="modal fade twofa" id="2fa-modal" tabindex="-1" role="dialog" aria-labelledby="2fa-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Verificación en 2 pasos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form autocomplete="off" id="form">
                    <div class="form__group form__pincode">
                        <label>Ingresa el código de 6 dígitos de tu aplicación de autenticación</label>
                        <input type="tel" name="pincode-1" maxlength="1" pattern="[\d]*" tabindex="1" placeholder="·"
                            autocomplete="off">
                        <input type="tel" name="pincode-2" maxlength="1" pattern="[\d]*" tabindex="2" placeholder="·"
                            autocomplete="off">
                        <input type="tel" name="pincode-3" maxlength="1" pattern="[\d]*" tabindex="3" placeholder="·"
                            autocomplete="off">
                        <input type="tel" name="pincode-4" maxlength="1" pattern="[\d]*" tabindex="4" placeholder="·"
                            autocomplete="off">
                        <input type="tel" name="pincode-5" maxlength="1" pattern="[\d]*" tabindex="5" placeholder="·"
                            autocomplete="off">
                        <input type="tel" name="pincode-6" maxlength="1" pattern="[\d]*" tabindex="6" placeholder="·"
                            autocomplete="off">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
template::footerLogin('registerNewUser.js');
?>
