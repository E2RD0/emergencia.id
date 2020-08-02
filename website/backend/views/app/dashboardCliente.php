<?php
require_once 'templates/templateUser.php';
template::headerSite('Dashboard del cliente');
?>

<div id="dashboard">
    <div class="container mt-5" id="dashboard">
        <h1 class="title-page">Perfiles</h1>

        <div class="nav d-flex d-md-block line nav-profiles" role="tablist">
            <a class="navbar-brand profile-option text-link active" data-toggle="tab" href="#perfiles">Mis perfiles</a>
            <a class="navbar-brand profile-option text-link" data-toggle="tab" href="#compartidos">Compartidos conmigo</a>
            <!-- btn escritorio -->
            <button @click="createNewProfile" class="button button--small button-profile d-none d-md-block" role="button"><i class="fas fa-plus mr-2"></i>{{newProfile}}</button>
        </div>
        <!-- btn movil -->
        <button @click="createNewProfile" class="button button--small d-block d-md-none mt-4" role="button"><i class="fas fa-plus mr-2"></i>{{newProfile}}</button>

        <div class="tab-content">
            <!-- cards de mis perfiles -->
            <div class="tab-pane active" id="perfiles" role="tabpanel">

                <div class="card profile-card my-5 text-center text-sm-left" v-for="(item, index) in show" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">
                    <div class="row no-gutters">
                        <div class="col-sm-3">
                            <img :src="item.foto" class="card-img img-fluid" :alt="item.nombres">
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body">
                                <h5 class="card-title text-regular" v-if="item.nombres === null">Complete su nombre.</h5>
                                <h5 class="card-title text-regular" v-else>{{item.nombres }} {{item.apellidos}}</h5>
                                <p class="card-text" v-if="item.date_part === null">Complete la información.</p>
                                <p class="card-text" v-else>{{item.date_part }} Años, {{item.nombre}}, {{item.ciudad}}</p>
                                <div class="d-flex flex-column d-sm-block">
                                    <a @click="redirectToEdit(item.id_perfil_medico)" class="color-text text-link mr-4 mb-3" style="cursor: pointer;">
                                        <i class="far fa-pencil mr-2" style="cursor: pointer"></i>
                                        Editar</a>
                                    <a href="#" class="color-text text-link mr-4 mb-3"><i class="far fa-clone mr-2"></i>
                                        Duplicar</a>
                                    <a href="#" class="color-text text-link mr-4 mb-3" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><i class="fas fa-ellipsis-h"></i></a>
                                    <div class="dropdown-menu profile-more-options" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item mb-1" href="#"><i class="far fa-address-card mr-2"></i>
                                            Tarjeta QR</a>
                                        <a class="dropdown-item mb-1" href="#"><i class="far fa-arrow-alt-down mr-2"></i>
                                            Descargar PDF</a>
                                        <a @click="getShares('id_perfil_medico', item.id_perfil_medico)" class="dropdown-item mb-1" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#compartirUsuarios"><i class="far fa-share-square mr-2"></i> Compartir</a>
                                        <a class="dropdown-item mb-1" href="#"><i class="fas fa-history mr-2"></i></i> Ver
                                            actividad</a>
                                        <a @click="encapsulateId('id_perfil_medico', item.id_perfil_medico)" class="dropdown-item" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminarperfil">
                                            <i class="far fa-trash mr-2"></i>Eliminar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- paginacion de perfiles -->
                <div class="d-flex justify-content-between" v-if="show == ''">
                    <h4 class="mt-2"></h4>
                    <nav aria-label="...">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>

                <div class="d-flex justify-content-between" v-else>
                    <h4 class="mt-2">Página: {{pag}}</h4>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item" v-show="pag != 1" @click.prevent="pag -= 1">
                                <a class="button button--small" href="#">Atras</a>
                            </li>

                            <li class="page-item" v-show="pag * NUM_RESULTS / show.length < 1" @click.prevent="pag += 1">
                                <a class="button button--small" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div> <!-- Tab pane perfiles -->


            <!-- cards de perfiles compartidos -->
            <div class="tab-pane" id="compartidos" role="tabpanel">

                <div class="card profile-card my-5 text-center text-sm-left" v-for="(item, index) in ShowShared" v-show="(pagC - 1) * NUM_RESULTSC <= index  && pagC * NUM_RESULTSC > index">
                    <div class="row no-gutters">
                        <div class="col-sm-3">
                            <img :src="item.foto" class="card-img img-fluid" :alt="item.nombres">
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body">
                                <h5 class="card-title text-regular" v-if="item.nombres === null">Complete su nombre.</h5>
                                <h5 class="card-title text-regular" v-else>{{item.nombres }} {{item.apellidos}}</h5>
                                <p class="card-text" v-if="item.date_part === null">Complete la información.</p>
                                <p class="card-text" v-else>{{item.date_part }} Años, {{item.nombre}}, {{item.ciudad}}</p>
                                <div class="d-flex flex-column d-sm-block">
                                    <a href="#" class="color-text text-link mr-4 mb-3"><i class="far fa-eye mr-2"></i>
                                        Ver</a>
                                    <a href="#" class="color-text text-link mr-4 mb-3"><i class="far fa-clone mr-2"></i>
                                        Guardar</a>
                                    <a href="#" class="color-text text-link mr-4 mb-3" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><i class="fas fa-ellipsis-h"></i></a>
                                    <div class="dropdown-menu profile-more-options" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item mb-1" href="#"><i class="far fa-arrow-alt-down mr-2"></i>
                                            Descargar PDF</a>
                                        <a @click="encapsulateId('id_perfil_medico', item.id_perfil_medico)" class="dropdown-item" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminarperfilcompartido"><i class="far fa-trash mr-2"></i> Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- paginacion de perfiles compartir -->
                <div class="d-flex justify-content-between" v-if="ShowShared == ''">
                    <h4 class="mt-2"></h4>
                    <nav aria-label="...">
                        <ul class="pagination">

                        </ul>
                    </nav>
                </div>

                <div class="d-flex justify-content-between" v-else>
                    <h4 class="mt-2">Página: {{pagC}}</h4>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item" v-show="pagC != 1" @click.prevent="pagC -= 1">
                                <a class="button button--small" href="#">Atras</a>
                            </li>

                            <li class="page-item" v-show="pagC * NUM_RESULTSC / ShowShared.length < 1" @click.prevent="pagC += 1">
                                <a class="button button--small" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div> <!-- Tab pane compartir -->

        </div>
        <!--Tab content -->

        <!-- modal compartir perfil -->
        <!-- <div class="modal fade" id="compartirEnlace" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header  border-0">
                        <h5 class="text-header-modal" id="exampleModalCenterTitle">Compartir el perfil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Con este enlace puedes compartir la información del perfil médico, para casos que no sean
                            emergencias (compartirlo con tu doctor,etc).</p>
                        <p class="card-text"><small class="text-muted">Copia el siguiente enlace</small></p>
                        <div class="input-group mb-4">
                            <input class="textfield" type="text" class="form-control" id="email" aria-describedby="basic-addon3">
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="modal-footer  border-0 d-flex justify-content-between">
                        <small class="text-muted"><a href="" style="text-decoration: none;font-weight: 600;color:grey"
                            data-toggle="modal" data-target="#compartirperfil" data-dismiss="modal">Compartir con un
                                usuario</a></small>
                        <button type="button" class="btn" style="background-color: white; color: #2F8DEB; font-weight: 600;">
                            Abrir enlace</button>
                        <button type="button" class="btn btn-primary" style="font-weight: 600;">Copiar enlace</button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- modal compartir perfil con usuario -->
        <div class="modal fade" ref="shareModal" id="compartirUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header  border-0">
                        <h5 class="text-header-modal" id="exampleModalCenterTitle">Compartir el perfil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Puedes compartir el perfil médico con una persona en específico: debe ser un usuario de la
                            plataforma.</p>
                        <p class="card-text"><small class="text-muted">Correo electrónico del usuario a compartir</small>
                        </p>
                        <div class="input-group mb-4">
                            <input class="textfield" type="email" class="form-control" id="email" aria-describedby="basic-addon3" ref="email">
                            <div class="line"></div>
                        </div>
                        <div class="d-flex row mb-4">
                            <div class="col-9">
                                <p class="text-left pl-3 mt-0 mr-auto" :class="textColor">{{sharingStatus}}</p>
                            </div>
                            <div class="col-3 text-right">
                                <button @click="shareProfileWith()" type="button" class="btn" style="font-weight: 600;color:black;border-color: #DDE3F0;">Invitar</button>
                            </div>
                        </div>
                        <div>
                            <p class="card-text" class="mb-3"><small class="text-muted">Gestiona quién tiene acceso</small></p>
                            <div :class="'overflow-auto' + upperSpace" style="height:130px; max-height:130px;">
                                <div class="d-flex justify-content-center" v-if="!sharedWith.length" v-html="loading"></div>
                                <div v-else="sharedWith.length" v-cloak id="users" class="p-4 d-flex justify-content-between sharedProfileUser" v-for="user in sharedWith">
                                    <p>{{user.nombres}} {{user.apellidos}}</p>
                                    <p class="mr-5" style="color:grey">{{user.email}}</p>
                                    <i @click="deleteSharing('id_usuario', user.id_usuario)" class="far fa-trash mt-1 text-link" style="color: grey; cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer  border-0 d-flex justify-content-between">
                        <small class="text-muted"><a href="" style="text-decoration: none;font-weight: 600;color:grey" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Compartir
                                enlace</a></small>
                        <button type="button" class="btn btn-primary" style="font-weight: 600;" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>



    <!-- modal eliminar perfil -->
    <div class="modal fade" id="eliminarperfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="text-header-modal" id="exampleModalCenterTitle">Eliminar perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro que quieres eliminar este perfil? Una vez eliminado no lo podrás recuperar</p>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-end">
                    <button @click="deleteProfile('Own')" type="button" class="btn" style="font-weight: 600;color:black;border-color: #DDE3F0;">
                        {{deleteText}}</button>
                    <button type="button" class="btn btn-primary" style="font-weight: 600;"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

        <!-- modal eliminar perfil compartido-->
    <div class="modal fade" id="eliminarperfilcompartido" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="text-header-modal" id="exampleModalCenterTitle">Eliminar perfil compartido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro que quieres eliminar este perfil? Perderás el acceso para verlo, pero el perfil seguirá disponible para el propietario.</p>
                </div>
                <div class="modal-footer  border-0 d-flex justify-content-end">
                    <button @click="deleteProfile('Shared')" type="button" class="btn" style="font-weight: 600;color:black;border-color: #DDE3F0;">
                        {{deleteText}}</button>
                    <button type="button" class="btn btn-primary" style="font-weight: 600;"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php
template::footerSite("dashboardUser.js");
?>
