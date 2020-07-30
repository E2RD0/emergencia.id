<?php
require_once 'templates/templateUser.php';
template::headerCreate('Nuevo perfil');
?>

<div id="newprofile">
    <div v-if="loaderTest" class="loader"><i class="far fa-spinner-third icon-load primary-cl"></i></div>
    <div v-else="loaderTest" v-cloak>
        <div class="showSave">
            {{savingTxt}}
            <div v-html="aaa"></div>
        </div>
        <div class="header-close">
            <div class="icon-close">
                <i @click="closeProfile" class="fas fa-times-circle"></i>
            </div>
        </div>
        <div class="container">
            <div class="text-center interline-header">
                <h3>{{dataProfile.name == '' ? 'Nuevo Perfil Medico' : dataProfile.name + ' ' + dataProfile.lastName}}
                </h3>
                <p class="text-target">{{calcDate}} {{dataProfile.direction == '' ? '' : dataProfile.direction + '.'}}
                </p>
                <div class="check-share">
                    <label class="label-check" for="check">
                        <input v-model="dataProfile.list" type="checkbox" id="check">
                        <div class="checked">
                            <i @click="debounceSearch" class="far fa-check"></i>
                        </div>
                        <div @click="debounceSearch" class="text-target">Permitir que los paramédicos puedan buscar este
                            perfil</div>
                    </label>
                </div>
            </div>
            <div class="mt-2">
                <p><span class="text-bar">{{calcProgress}}% </span><span class="text-target">del perfil
                        completado</span>
                </p>
                <div class="progress" style="height:0.2rem">
                    <div :class="calcProgressColor" role="progressbar" :style="'width:' + calcProgress + '%'"
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="mt-4">
                <h5>Información personal</h5>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Fecha de nacimiento</label>
                            <input @input="debounceSearch" v-model="dataProfile.date" tabindex="1"
                                class="input-date-picker" type="date" aria-describedby="basic-addon3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Nombres</label>
                            <input @input="debounceSearch" tabindex="3" class="textfield" type="text"
                                v-model="dataProfile.name">
                            <!-- Perfecto!vaya cerrare la conexion en fb seguimos mucahs gracias-->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Tipo de sangre</label>
                            <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                            <select @input="debounceSearch" v-model="dataProfile.selectedIdBlood" tabindex="5"
                                class="textfield">
                                <option selected value="Seleccionar">Seleccionar</option>
                                <option v-for="item in blood" :value="item.id_tipo_sangre">{{item.tipo}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Documento de identidad</label>
                            <input @input="debounceSearch" v-model="dataProfile.document" tabindex="7" class="textfield"
                                type="text" class="form-control" aria-describedby="basic-addon3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Peso</label>
                            <input placeholder="Ej: 150 lbs" @input="debounceSearch" v-model="dataProfile.weight"
                                tabindex="9" class="textfield" type="text" class="form-control"
                                aria-describedby="basic-addon3">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group ">
                            <div class="up-photo">
                                <div class="upload-photo-box">
                                    <img :src="dataProfile.image">
                                </div>
                                <div class="text-upload">
                                    <input style="display: none" ref="fileInput" type="file" @change="onFileSelected">
                                    <span @input="debounceSearch" @click="$refs.fileInput.click()">Subir imagen</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target mt-1">Apellidos</label>
                            <input @input="debounceSearch" tabindex="4" class="textfield" v-model="dataProfile.lastName"
                                type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Donante de organos</label>
                            <select @input="debounceSearch" v-model="dataProfile.donor" tabindex="8" class="textfield">
                                <option v-for="item in options" :value="item.value">{{item.text}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Estado ISSS</label>
                            <select @input="debounceSearch" v-model="dataProfile.isssEstatusSelected" tabindex="5"
                                class="textfield">
                                <option selected value="Seleccionar">Seleccionar</option>
                                <option v-for="item in issEstatus" :value="item.id_estado_isss">{{item.estado}}</option>
                            </select>
                            <!-- <input class="textfield" type="text" class="form-control"> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Estatura</label>
                            <input placeholder="Ej: 1.80 cm" @input="debounceSearch" v-model="dataProfile.height"
                                tabindex="10" class="textfield" type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <h5 class="mt-4">Ubicación</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">País</label>
                            <select @input="debounceSearch" v-model="countrySelect" tabindex="5" class="textfield">
                                <option selected value="Seleccionar">Seleccionar</option>
                                <option v-for="item in countryList" :value="item.id_pais">{{item.nombre}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target mt-1">Ciudad</label>
                            <input @input="debounceSearch" v-model="dataProfile.province" tabindex="14"
                                class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">Estado/Provincia</label>
                            <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                            <select @input="debounceSearch" v-model="dataProfile.city" tabindex="5" class="textfield">
                                <option selected value="Seleccionar">Seleccionar</option>
                                <option v-for="item in cityList" :value="item.id_pais_estado">{{item.nombre}}</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target mt-1">Dirección</label>
                            <input @input="debounceSearch" v-model="dataProfile.direction" tabindex="14"
                                class="textfield" type="text" class="form-control" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>

                <h5 class="mt-4">Contactos de emergencia</h5>
                <p class="text-target">Ingresa a las personas que los paramédicos podrían contactar en caso de
                    emergencia
                </p>

                <div class="emergency-contact mt-2" v-for="item in addEmergencycontacts">
                    <div>
                        <div class="target">
                            <div class="icon-target">
                                <i class="far fa-th"></i>
                            </div>
                            <div class="controller">
                                <div class="content-target">
                                    <div class="left">
                                        <span>{{item.nombre}}</span>
                                        <div>
                                            <span class="text-target">{{item.telefono}} - {{item.email}} -
                                                {{item.direccion}}</span>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <a>
                                            <i class="far fa-trash text-target"></i>
                                        </a>
                                        <a data-toggle="collapse" :data-target="'#addContact' + item.id_contacto"
                                            aria-expanded="false" :aria-controls="'addContact' + item.id_contacto">
                                            <i class="fas fa-angle-down text-target"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Contenido collapsable -->
                                <div class="collapse content-collapse" :id="'addContact' + item.id_contacto">
                                    <div class="edit-target">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                                    <input v-model="item.name" tabindex="2" class="textfield"
                                                        type="text" aria-describedby="basic-addon3">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Teléfono</label>
                                                    <input v-model="item.telefono" class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Relación</label>
                                                    <input v-model="item.relacion" class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Email</label>
                                                    <input v-model="item.email" class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        class="text-target">Dirección</label>
                                                    <input v-model="item.direccion" class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
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
                        <a data-toggle="collapse" href="#addContact" data-toggle="collapse" aria-expanded="false"
                            aria-controls="addContact"><i class="fas fa-plus icon-add-contact"></i> Nuevo contacto</a>
                    </div>
                    <div class="addNewContactForm">
                        <!-- Contenido collapsable -->
                        <div class="collapse content-collapse" id="addContact">
                            <div class="edit-target">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                            <input v-model="addNewContactForm.name" tabindex="2" class="textfield"
                                                type="text" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Teléfono</label>
                                            <input v-model="addNewContactForm.telephone" class="textfield" type="text"
                                                aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Relación</label>
                                            <input v-model="addNewContactForm.relacion" class="textfield" type="text"
                                                aria-describedby="basic-addon3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Email</label>
                                            <input v-model="addNewContactForm.email" class="textfield" type="text"
                                                aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Dirección</label>
                                            <input v-model="addNewContactForm.direction" class="textfield" type="text"
                                                aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-add-new">
                                <button data-toggle="collapse" href="#addContact" data-toggle="addContact"
                                    aria-expanded="false" aria-controls="addContact"
                                    @click="createNewContact(), debounceSearch()" class="button "><i
                                        class="fas fa-plus icon-add-contact"></i>Agregar</button>
                            </div>
                        </div>

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
                                                    <input class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Nota
                                                        adicional</label>
                                                    <input class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="text-target">Cantidad
                                                                de
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
                                                        <!--<a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>-->
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
                        <a data-toggle="collapse" href="#addMedicament" data-toggle="collapse" aria-expanded="false"
                            aria-controls="addMedicament"><i class="fas fa-plus icon-add-contact"></i> Nuevo medicamento</a>
                    </div>
                    <div class="addNewContactForm">
                        <!-- Contenido collapsable -->
                        <div class="collapse content-collapse" id="addMedicament">
                                    <div class="edit-target">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                                    <input class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-target">Nota
                                                        adicional</label>
                                                    <input class="textfield" type="text"
                                                        aria-describedby="basic-addon3">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="text-target">Cantidad
                                                                de
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
        <div class="end"></div>
    </div>
</div>
<?php
template::footerSite('newProfile.js');
?>