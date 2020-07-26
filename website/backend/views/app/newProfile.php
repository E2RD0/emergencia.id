<?php
require_once '../templates/templateUser.php';
template::headerCreate('Nuevo perfil');
?>

<div class="container">
    <div class="text-center interline-header">
        <h3>Eduardo Estrada</h3>
        <p class="text-secondary">18 años, San Salvador, El Salvador.</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label text-secondary" for="defaultCheck1">
                Permitir que los paramédicos puedan buscar este perfil
            </label>
        </div>
    </div>
    <div class="mt-2">
        <p><span class="text-danger">10% </span><span class="text-secondary">del perfil completado</span></p>
        <div class="progress" style="height:0.2rem">
            <div class="progress-bar bg-danger " role="progressbar" style="width: 10%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="mt-5">
        <h5>Información personal</h5>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <label for="exampleInputEmail1" class="text-secondary">Fecha de nacimiento</label>
                    <input class="text-field input-date-picker mb-3" type="date" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Nombres</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Tipo sangre</label>
                    <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                    <select class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Documento de identidad</label>
                    <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Peso</label>
                    <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Subir fotografia</label>
                    <div class="custom-file">
                        <input class="textfield custom-file-input" type="file" class="form-control" aria-describedby="basic-addon3">
                        <!-- <div class="line"></div> -->
                        <!-- <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01"> -->
                        <label class="custom-file-label textfield" for="inputGroupFile01">Elegir archivo</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary mt-1">Apellidos</label>
                    <input class="textfield" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Donante de organos</label>
                    <input class="textfield" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Estado ISSS</label>
                    <select class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <!-- <input class="textfield" type="text" class="form-control"> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Estatura</label>
                    <input class="textfield" type="text" class="form-control">
                </div>
            </div>
        </div>

        <h5 class="mt-4">Ubicación</h5>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">País</label>
                    <select class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Ciudad</label>
                    <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                    <select class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Estado/Provincia</label>
                    <select class="textfield">
                        <option selected>Seleccionar</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary mt-1">Dirección</label>
                    <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                </div>
            </div>
        </div>

        <h5 class="mt-4">Contactos de emergencia</h5>
        <p class="text-secondary">Ingresa a las personas que los paramédicos podrían contactar en caso de emergencia</p>
        <div class="interline-header mt-4 p-3">

            <p>Carolina Estrada (Madre)</p>
            <i class="fas fa-angle-up float-right"></i>
            <p class="text-secondary">+5037884568 - carolinaestrada@mail.com - Reparto Maquilishuat Av...</p>

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Nombre</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Teléfono</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Relación</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Email</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Dirección</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>

            </div>

            <div class="form-group col-lg-12 mt-3">
                <a href="" class="" style="text-decoration: none">Nuevo contacto</a>
            </div>

        </div>

        <h5 class="mt-4">Medicamentos</h5>
        <p class="text-secondary">Ingresa la medicación que tomas regularmente.</p>
        <div class="interline-header mt-4 p-3">
            <p>Benazepril</p>
            <i class="fas fa-angle-up float-right"></i>
            <p class="text-secondary">500mg cada 12 horas</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Nombre</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="text-secondary">Nota adicional</label>
                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-secondary">Cantidad de dosis</label>
                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-secondary">Frecuencia</label>
                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                        </div>
                        <a href="" >paperclip Adjuntar archivo</a>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-secondary">Unidad</label>
                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-lg-12 mt-3">
                <a href="" class="" >Nuevo medicamento</a>
            </div>

        </div>
    </div>
</div>
<div class="end"></div>
<?php
template::footerSite();
?>