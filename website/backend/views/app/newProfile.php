<?php
require_once 'templates/templateUser.php';
template::headerCreate('Nuevo perfil');
?>
<div class="header-close">
    <div class="icon-close">
        <i class="fas fa-times-circle"></i>
    </div>
</div>
<div class="container">
    <div class="text-center interline-header">
        <h3>Eduardo Estrada</h3>
        <p class="text-target">18 años, San Salvador, El Salvador.</p>
        <div class="check-share">
            <label class="label-check" for="check">
                <input type="checkbox" id="check">
                <div class="checked">
                    <i class="far fa-check"></i>
                </div>
                <span class="text-target">Permitir que los paramédicos puedan buscar este perfil</span>
            </label>
        </div>
    </div>
    <div class="mt-2">
        <p><span class="text-bar">10% </span><span class="text-target">del perfil completado</span></p>
        <div class="progress" style="height:0.2rem">
            <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
    </div>
    <div class="mt-4">
        <h5>Información personal</h5>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Fecha de nacimiento</label>
                    <input tabindex="1" class="input-date-picker" type="date" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Nombres</label>
                    <input tabindex="3" class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Tipo de sangre</label>
                    <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                    <select tabindex="5" class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Documento de identidad</label>
                    <input tabindex="7" class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Peso</label>
                    <input tabindex="9" class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group ">
                    <div class="up-photo">
                    <div class="upload-photo-box">
                        <img src="https://boostlikes-bc85.kxcdn.com/blog/wp-content/uploads/2019/08/No-Instagram-Profile-Pic.jpg">
                    </div>
                    <div class="text-upload">
                        <span tabindex="2">Subir fotografia</span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target mt-1">Apellidos</label>
                    <input tabindex="4" class="textfield" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Donante de organos</label>
                    <input tabindex="6" class="textfield" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Estado ISSS</label>
                    <select tabindex="8" class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <!-- <input class="textfield" type="text" class="form-control"> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Estatura</label>
                    <input tabindex="10" class="textfield" type="text" class="form-control">
                </div>
            </div>
        </div>

        <h5 class="mt-4">Ubicación</h5>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">País</label>
                    <select tabindex="11" class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Ciudad</label>
                    <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                    <select tabindex="13" class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target">Estado/Provincia</label>
                    <select tabindex="12" class="textfield text-select">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-target mt-1">Dirección</label>
                    <input tabindex="14" class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                </div>
            </div>
        </div>

        <h5 class="mt-4">Contactos de emergencia</h5>
        <p class="text-target">Ingresa a las personas que los paramédicos podrían contactar en caso de emergencia</p>

        <div class="emergency-contact">
            <div>
                <div class="target">
                    <div class="icon-target">
                        <i class="far fa-th"></i>
                    </div>
                    <div class="controller">
                        <div class="content-target">
                            <div class="left">
                                <span>Carolina Estrada</span>
                                <div>
                                    <span class="text-target">+50361473015 - carolinaestrada@gmail.com - Reparto
                                        Maquilishuat Av...</span>
                                </div>
                            </div>
                            <div class="right">
                                <a>
                                    <i class="far fa-trash text-target"></i>
                                </a>
                                <a data-toggle="collapse" data-target="#addContact" aria-expanded="false"
                                    aria-controls="addContact">
                                    <i class="fas fa-angle-down text-target"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Contenido collapsable -->
                        <div class="collapse content-collapse" id="addContact">
                            <div class="edit-target">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                            <input tabindex="2" class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Teléfono</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Relación</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Email</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Dirección</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 add-new-contact">
                <a><i class="fas fa-plus icon-add-contact"></i> Nuevo contacto</a>
            </div>
        </div>

        <h5 class="mt-4">Medicamentos</h5>
        <p class="text-target">Ingresa la medicación que tomas regularmente.</p>

        <div class="emergency-contact">
            <div>
                <div class="target">
                    <div class="icon-target">
                        <i class="far fa-th"></i>
                    </div>
                    <div class="controller">
                        <div class="content-target">
                            <div class="left">
                                <span>Benazepril</span>
                                <div>
                                    <span class="text-target">500mg cada 12 horas</span>
                                </div>
                            </div>
                            <div class="right">
                                <a>
                                    <i class="far fa-trash text-target"></i>
                                </a>
                                <a data-toggle="collapse" data-target="#addMedicamento" aria-expanded="false"
                                    aria-controls="addMedicamento">
                                    <i class="fas fa-angle-down text-target"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Contenido collapsable -->
                        <div class="collapse content-collapse" id="addMedicamento">
                            <div class="edit-target">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Nota
                                                adicional</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Cantidad de
                                                        dosis</label>
                                                    <input class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        class="text-target">Frecuencia</label>
                                                    <input class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                                <a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        class="text-target">Unidad</label>
                                                    <input class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 mt-2"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mt-3 add-new-contact">
                <a><i class="fas fa-plus icon-add-contact"></i> Nuevo medicamento</a>
            </div>
        </div>


    </div>
</div>
<div class="end"></div>
<?php
template::footerSite();
?>