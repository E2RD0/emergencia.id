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
                <p><span :class="calcProgressColorText">{{calcProgress}}% </span><span class="text-target">del perfil
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
                            <input id="dateToChoose" @input="debounceSearch" v-model="dataProfile.date" tabindex="1"
                                class="input-date-picker" type="date" aria-describedby="basic-addon3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-target">{{messagesError.nombreUsuario}}</label>
                            <input onkeypress="return soloLetras(event)" @input="debounceSearch" tabindex="3" class="textfield" type="text"
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
                            <input onkeypress="return (event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode)));" @input="debounceSearch" v-model="dataProfile.document" tabindex="7" class="textfield"
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
                            <input onkeypress="return soloLetras(event)" @input="debounceSearch" tabindex="4" class="textfield" v-model="dataProfile.lastName"
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
                            <input onkeypress="return soloLetras(event)" @input="debounceSearch" v-model="dataProfile.province" tabindex="14"
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

                <div class="perfil-contacto-emergencia">
                    <h5 class="mt-4">Contactos de emergencia ({{addEmergencycontacts.length}})</h5>
                    <p class="text-target">Ingresa a las personas que los paramédicos podrían contactar en caso de
                        emergencia
                    </p>
                    <button style="margin-left: 30px" class="button" onclick="reporteContactosEmergencia()">Generar reporte</button>

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
                                            <a data-toggle="modal" data-target="#eliminarContacto" @click="changeId(item.id_contacto)">
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
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Nombre</label>
                                                        <input v-model="item.nombre" tabindex="2" class="textfield"
                                                            type="text" aria-describedby="basic-addon3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Teléfono</label>
                                                        <input onkeypress="return (event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode)));" v-model="item.telefono" class="textfield" type="text"
                                                            aria-describedby="basic-addon3">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Relación</label>
                                                        <input v-model="item.relacion" class="textfield" type="text"
                                                            aria-describedby="basic-addon3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Email</label>
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
                                aria-controls="addContact"><i class="fas fa-plus icon-add-contact"></i> Nuevo
                                contacto</a>
                        </div>
                        <div class="addNewContactForm">
                            <!-- Contenido collapsable -->
                            <div class="collapse content-collapse" id="addContact">
                                <div class="edit-target">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                                <input onkeypress="return soloLetras(event)" v-model="addNewContactForm.name" tabindex="2" class="textfield"
                                                    type="text" aria-describedby="basic-addon3">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Teléfono</label>
                                                <input onkeypress="return (event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode)));" v-model="addNewContactForm.telephone" class="textfield"
                                                    type="text" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Relación</label>
                                                <input onkeypress="return soloLetras(event)" v-model="addNewContactForm.relacion" class="textfield"
                                                    type="text" aria-describedby="basic-addon3">
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
                                                <input v-model="addNewContactForm.direction" class="textfield"
                                                    type="text" aria-describedby="basic-addon3">
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
                </div>

                <div class="perfil-contacto-doctor">
                    <h5 class="mt-4">Contactos doctor ({{getDoctorContact.length}})</h5>
                    <p class="text-target">Ingresa los paramedicos que se podrían contactar en caso de emergencia.</p>
                    <button style="margin-left: 30px" class="button">Generar reporte</button>
                    <div class="emergency-contact mt-2" v-for="item in getDoctorContact">
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
                                                <span class="text-target">{{item.nombre}} - {{item.telefono}}</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <a data-toggle="modal" data-target="#eliminarContactoDoctor" @click="changeIdContactDoctor(item.id_contacto_d)">
                                                <i class="far fa-trash text-target"></i>
                                            </a>
                                            <a data-toggle="collapse" :data-target="'#loadDoc' + item.id_contacto_d"
                                                aria-expanded="false" :aria-controls="'loadDoc' + item.id_contacto_d">
                                                <i class="fas fa-angle-down text-target"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Contenido collapsable -->
                                    <div class="collapse content-collapse" :id="'loadDoc' + item.id_contacto_d">
                                        <div class="edit-target">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Nombre</label>
                                                        <input onkeypress="return soloLetras(event)" v-model="addNewContactForm.name" v-model="item.nombre" tabindex="2" class="textfield"
                                                            type="text" aria-describedby="basic-addon3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Teléfono</label>
                                                        <input onkeypress="return (event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode)));" v-model="item.telefono" class="textfield" type="text"
                                                            aria-describedby="basic-addon3">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Especialidad</label>
                                                        <input onkeypress="return soloLetras(event)" v-model="addNewContactForm.name" v-model="item.especialidad" class="textfield" type="text"
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
                            <a data-toggle="collapse" href="#addDoctor" data-toggle="collapse" aria-expanded="false"
                                aria-controls="addDoctor"><i class="fas fa-plus icon-add-contact"></i> Nuevo contacto
                                doctor</a>
                        </div>
                        <div class="addNewContactForm">
                            <!-- Contenido collapsable -->
                            <div class="collapse content-collapse" id="addDoctor">
                                <div class="edit-target">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                                <input onkeypress="return soloLetras(event)" v-model="addNewContactForm.name" v-model="addDoctorContact.nombre" tabindex="2" class="textfield"
                                                    type="text" aria-describedby="basic-addon3">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Teléfono</label>
                                                <input onkeypress="return (event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode)));" v-model="addDoctorContact.telefono" class="textfield" type="text"
                                                    aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Especialidad</label>
                                                <input onkeypress="return soloLetras(event)" v-model="addNewContactForm.name" placeholder="Ej: Cardiólogo"
                                                    v-model="addDoctorContact.especialidad" class="textfield"
                                                    type="text" aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-add-new">
                                    <button data-toggle="collapse" href="#addDoctor" data-toggle="addDoctor"
                                        aria-expanded="false" aria-controls="addDoctor"
                                        @click="addDoctor(), debounceSearch()" class="button "><i
                                            class="fas fa-plus icon-add-contact"></i>Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="perfil-medicacion">
                    <h5 class="mt-4">Medicamentos ({{getMedicacion.length}})</h5>
                    <p class="text-target">Ingresa la medicación que tomas regularmente.</p>

                    <div class="emergency-contact mt-2" v-for="item in getMedicacion">
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
                                                <span class="text-target">{{item.dosis}} - {{item.frecuencia}}</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <a>
                                                <i class="far fa-trash text-target"></i>
                                            </a>
                                            <a data-toggle="collapse"
                                                :data-target="'#loadMedicamento' + item.id_medicacion"
                                                aria-expanded="false"
                                                :aria-controls="'loadMedicamento' + item.id_medicacion">
                                                <i class="fas fa-angle-down text-target"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Contenido collapsable -->
                                    <div class="collapse content-collapse" :id="'loadMedicamento' + item.id_medicacion">
                                        <div class="edit-target">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Nombre</label>
                                                        <input onkeypress="return soloLetras(event)" v-model="item.nombre" class="textfield" type="text"
                                                            aria-describedby="basic-addon3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="text-target">Nota
                                                            adicional</label>
                                                        <input v-model="item.notas" class="textfield" type="text"
                                                            aria-describedby="basic-addon3">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"
                                                                    class="text-target">Cantidad
                                                                    de
                                                                    dosis</label>
                                                                <input v-model="item.dosis" class="textfield"
                                                                    type="text" aria-describedby="basic-addon3">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"
                                                                    class="text-target">Frecuencia</label>
                                                                <input v-model="item.frecuencia" class="textfield"
                                                                    type="text" aria-describedby="basic-addon3">
                                                            </div>
                                                            <!--<a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>-->
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
                                aria-controls="addMedicament"><i class="fas fa-plus icon-add-contact"></i> Nuevo
                                medicamento</a>
                        </div>
                        <div class="addNewContactForm mt-2">
                            <!-- Contenido collapsable -->
                            <div class="collapse content-collapse" id="addMedicament">
                                <div class="edit-target">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Nombre</label>
                                                <input onkeypress="return soloLetras(event)" v-model="addMedicacion.nombre" class="textfield" type="text"
                                                    aria-describedby="basic-addon3">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Nota
                                                    adicional</label>
                                                <input v-model="addMedicacion.notas" class="textfield" type="text"
                                                    aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="text-target">Cantidad
                                                            de
                                                            dosis</label>
                                                        <input v-model="addMedicacion.dosis" class="textfield"
                                                            type="text" aria-describedby="basic-addon3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Frecuencia</label>
                                                        <input v-model="addMedicacion.frecuencia" class="textfield"
                                                            type="text" aria-describedby="basic-addon3">
                                                    </div>
                                                    <a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-add-new">
                                        <button data-toggle="collapse" href="#addMedicament" data-toggle="addMedicament"
                                            aria-expanded="false" aria-controls="addMedicament"
                                            @click="addMedicament(), debounceSearch()" class="button "><i
                                                class="fas fa-plus icon-add-contact"></i>Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="perfil-condicion-medica">
                    <h5 class="mt-4">Condición médica</h5>
                    <p class="text-target">Tu condición medica puede ayudar a los paramedicos en caso de emergencia.</p>
                    <button style="margin-left: 30px" class="button" onclick="reporteCondicionesMedicas()">Generar reporte</button>
                    <div class="emergency-contact mt-2" v-for="item in getCondition">
                        <div>
                            <div class="target">
                                <div class="icon-target">
                                    <i class="far fa-th"></i>
                                </div>
                                <div class="controller">
                                    <div class="content-target">
                                        <div class="left">
                                            <span>{{item.condicion}}</span>
                                            <div>
                                                <span class="text-target"></span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <a>
                                                <i class="far fa-trash text-target"></i>
                                            </a>
                                            <a data-toggle="collapse"
                                                :data-target="'#loadCondicionMedica' + item.id_condicion"
                                                aria-expanded="false"
                                                :aria-controls="'loadCondicionMedica' + item.id_condicion">
                                                <i class="fas fa-angle-down text-target"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Contenido collapsable -->
                                    <div class="collapse content-collapse"
                                        :id="'loadCondicionMedica' + item.id_condicion">
                                        <div class="edit-target">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Nombre</label>
                                                        <input onkeypress="return soloLetras(event)" v-model="item.condicion" class="textfield" type="text"
                                                            aria-describedby="basic-addon3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="text-target">Nota
                                                            adicional</label>
                                                        <input v-model="item.notas" class="textfield" type="text"
                                                            aria-describedby="basic-addon3">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"
                                                                    class="text-target">Medicación</label>
                                                                <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                                                                <select @input="debounceSearch"
                                                                    v-model="item.id_medicacion" tabindex="5"
                                                                    class="textfield">
                                                                    <option selected value="Seleccionar">Seleccionar
                                                                    </option>
                                                                    <option v-for="item in getMedicacion"
                                                                        :value="item.id_medicacion">
                                                                        {{item.nombre}}</option>
                                                                </select>
                                                            </div>
                                                            <!--<a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>-->
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
                            <a data-toggle="collapse" href="#addCondition" data-toggle="collapse" aria-expanded="false"
                                aria-controls="addCondition"><i class="fas fa-plus icon-add-contact"></i> Nueva
                                condición medica</a>
                        </div>
                        <div class="addNewContactForm">
                            <!-- Contenido collapsable -->
                            <div class="collapse content-collapse" id="addCondition">
                                <div class="edit-target">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Condición</label>
                                                <input onkeypress="return soloLetras(event)" v-model="addCondition.condicion" class="textfield" type="text"
                                                    aria-describedby="basic-addon3">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Nota
                                                    adicional</label>
                                                <input v-model="addCondition.notas" class="textfield" type="text"
                                                    aria-describedby="basic-addon3">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1"
                                                            class="text-target">Medicación</label>
                                                        <!-- <input class="textfield" type="text" class="form-control" aria-describedby="basic-addon3"> -->
                                                        <select @input="debounceSearch"
                                                            v-model="addCondition.id_medicacion" tabindex="5"
                                                            class="textfield">
                                                            <option selected value="Seleccionar">Seleccionar</option>
                                                            <option v-for="item in getMedicacion"
                                                                :value="item.id_medicacion">
                                                                {{item.nombre}}</option>
                                                        </select>
                                                    </div>
                                                    <a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-add-new">
                                        <button data-toggle="collapse" href="#addCondition" data-toggle="addCondition"
                                            aria-expanded="false" aria-controls="addCondition"
                                            @click="addCon(), debounceSearch()" class="button "><i
                                                class="fas fa-plus icon-add-contact"></i>Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="perfil-alergia">
                    <h5 class="mt-4">Alergias</h5>
                    <p class="text-target">Especifica tus alergias para que sea ayuda a los paramedicos en caso de
                        emergencia.</p>

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
                                            <a data-toggle="collapse" data-target="#addMedicamento"
                                                aria-expanded="false" aria-controls="addMedicamento">
                                                <i class="fas fa-angle-down text-target"></i>
                                            </a>
                                        </div>
                                    </div>

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
                                            <label for="exampleInputEmail1" class="text-target">Cantidad
                                                de
                                                dosis</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                            <input class="textfield" type="text" aria-describedby="basic-addon3">
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
            aria-controls="addMedicament"><i class="fas fa-plus icon-add-contact"></i> Nuevo
            medicamento</a>
    </div>
    <div class="addNewContactForm">

        <div class="collapse content-collapse" id="addMedicament">
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
                                    <label for="exampleInputEmail1" class="text-target">Cantidad
                                        de
                                        dosis</label>
                                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                    <input class="textfield" type="text" aria-describedby="basic-addon3">
                                </div>
                                <a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                    <input class="textfield" type="text" aria-describedby="basic-addon3">
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

<div class="perfil-procedimiento-medico">
    <h5 class="mt-4">Procedimiento médico</h5>
    <p class="text-target">Ingresa tus antecedentes medicos.</p>

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
                                                <label for="exampleInputEmail1" class="text-target">Cantidad
                                                    de
                                                    dosis</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
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
                aria-controls="addMedicament"><i class="fas fa-plus icon-add-contact"></i> Nuevo
                medicamento</a>
        </div>
        <div class="addNewContactForm">

            <div class="collapse content-collapse" id="addMedicament">
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
                                        <label for="exampleInputEmail1" class="text-target">Cantidad
                                            de
                                            dosis</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                                    </div>
                                    <a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
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

<div class="perfil-seguro-medico">
    <h5 class="mt-4">Seguro médico</h5>
    <p class="text-target">Ingresa tu seguro medico.</p>

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
                                                <label for="exampleInputEmail1" class="text-target">Cantidad
                                                    de
                                                    dosis</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
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
                aria-controls="addMedicament"><i class="fas fa-plus icon-add-contact"></i> Nuevo
                medicamento</a>
        </div>
        <div class="addNewContactForm">

            <div class="collapse content-collapse" id="addMedicament">
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
                                        <label for="exampleInputEmail1" class="text-target">Cantidad
                                            de
                                            dosis</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                                    </div>
                                    <a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
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

<div class="perfil-otra-informacion">
    <h5 class="mt-4">Otra información</h5>
    <p class="text-target">Ingresa información adicional para que pueda ser de ayuda a los paramedicos
        en
        caso de
        emergencia.</p>

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
                                                <label for="exampleInputEmail1" class="text-target">Cantidad
                                                    de
                                                    dosis</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                                <input class="textfield" type="text" aria-describedby="basic-addon3">
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
                aria-controls="addMedicament"><i class="fas fa-plus icon-add-contact"></i> Nuevo
                medicamento</a>
        </div>
        <div class="addNewContactForm">

            <div class="collapse content-collapse" id="addMedicament">
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
                                        <label for="exampleInputEmail1" class="text-target">Cantidad
                                            de
                                            dosis</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-target">Frecuencia</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
                                    </div>
                                    <a href=""><i class="fas fa-paperclip"></i> Adjuntar archivo</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-target">Unidad</label>
                                        <input class="textfield" type="text" aria-describedby="basic-addon3">
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
-->
            </div>
        </div>
        <!-- modal eliminar contacto -->
        <div class="modal fade" id="eliminarContacto" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="text-header-modal" id="exampleModalCenterTitle">Eliminar contacto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro que quieres eliminar este contacto? Una vez eliminado no lo podrás recuperar</p>
                    </div>
                    <div class="modal-footer border-0 d-flex justify-content-end">
                        <button @click="deleteContact(idToDeleteContact.id)" type="button" class="btn"
                            style="font-weight: 600;color:black;border-color: #DDE3F0;">
                            {{idToDeleteContact.text}}</button>
                        <button type="button" class="btn btn-primary" style="font-weight: 600;"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal eliminar contacto doctor -->
        <div class="modal fade" id="eliminarContactoDoctor" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="text-header-modal" id="exampleModalCenterTitle">Eliminar contacto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro que quieres eliminar este contacto? Una vez eliminado no lo podrás recuperar</p>
                    </div>
                    <div class="modal-footer border-0 d-flex justify-content-end">
                        <button @click="deleteContactDoctor(idToDeleteContactDoctor.id)" type="button" class="btn"
                            style="font-weight: 600;color:black;border-color: #DDE3F0;">
                            {{idToDeleteContactDoctor.text}}</button>
                        <button type="button" class="btn btn-primary" style="font-weight: 600;"
                            data-dismiss="modal">Cancelar</button>
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
