<?php
require_once 'templates/templateUser.php';
template::headerSite('Dashboard del cliente');
?>
<div id="dashboard">
    <div v-if="showModal" class="container mt-5" id="dashboard">
        <h1 class="title-page">Profiles</h1>
        <div class="row px-3">
            <div
                class="col-12 col-md-6 nav d-flex d-md-block nav-profiles"
                role="tablist"
            >
                <a
                    class="navbar-brand profile-option text-link active"
                    data-toggle="tab"
                    href="#perfiles"
                    >My profiles</a
                >
                <a
                    class="navbar-brand profile-option text-link"
                    data-toggle="tab"
                    href="#compartidos"
                    >Shared with me</a
                >
                <!-- btn escritorio -->
            </div>
            <div class="col-md-6 d-none d-md-flex justify-content-end p-0">
                <button
                    @click="getProfilesReport"
                    class="button button--small mr-2"
                    role="button"
                >
                    <i class="fas fa-list"></i>
                    <p class="d-inline-block my-0 ml-2">Profile list</p>
                </button>
                <button
                    @click="createNewProfile"
                    class="button button--small"
                    role="button"
                >
                    <i class="fas fa-plus mr-2"></i>
                    {{ newProfile }}
                </button>
            </div>
        </div>

        <!-- btn movil -->
        <div class="col-12 d-flex justify-content-around mt-4 d-md-none">
            <button
                @click="getProfilesReport"
                class="button button--small"
                role="button"
            >
                <i class="fas fa-list"></i>
                <p class="d-inline-block my-0 ml-2">Profile list</p>
            </button>
            <button
                @click="createNewProfile"
                class="button button--small"
                role="button"
            >
                <i class="fas fa-plus mr-2"></i>
                {{ newProfile }}
            </button>
        </div>

        <div class="tab-content">
            <!-- cards de mis perfiles -->
            <div class="tab-pane active" id="perfiles" role="tabpanel">
                <div
                    class="card profile-card my-5 text-center text-sm-left"
                    v-for="(item, index) in show"
                    v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index"
                >
                    <div class="row no-gutters">
                        <div class="col-sm-3">
                            <img
                                :src="getProfilePhoto(item.foto)"
                                class="card-img img-fluid"
                                :alt="item.nombres"
                            />
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body">
                                <h5
                                    class="card-title text-regular"
                                    v-if="item.nombres === null"
                                >
                                    Complete your name.
                                </h5>
                                <h5 class="card-title text-regular" v-else>
                                    {{ item.nombres }} {{ item.apellidos }}
                                </h5>
                                <p
                                    class="card-text"
                                    v-if="item.date_part === null"
                                >
                                    Complete the information.
                                </p>
                                <p class="card-text" v-else>
                                    {{ item.date_part }} years, {{ item.nombre}}, {{ item.ciudad }}
                                </p>
                                <div class="d-flex flex-column d-sm-block">
                                    <a
                                        @click="redirectToEdit(item.id_perfil_medico)"
                                        class="color-text text-link mr-4 mb-3"
                                        style="cursor: pointer"
                                    >
                                        <i
                                            class="far fa-pencil mr-2"
                                            style="cursor: pointer"
                                        ></i>
                                        Edit</a
                                    >
                                    <a
                                        href="#"
                                        class="color-text text-link mr-4 mb-3"
                                    >
                                        <i class="far fa-clone mr-2"></i>
                                        Duplicate</a
                                    >
                                    <a
                                        href="#"
                                        class="color-text text-link mr-4 mb-3"
                                        id="dropdownMenuOffset"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-offset="0,5"
                                    >
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div
                                        class="dropdown-menu profile-more-options"
                                        aria-labelledby="dropdownMenuOffset"
                                    >
                                        <a
                                            @click="imrpCode(item.uid, item.nombres, item.apellidos, item.date_part, item.ciudad)"
                                            class="dropdown-item mb-1"
                                            href="#"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#compartirQr"
                                        >
                                            <span>
                                                <i
                                                    class="far fa-address-card mr-2"
                                                ></i>
                                            </span>
                                            <span>
                                                <p class="dd-p">QR card</p>
                                            </span>
                                        </a>
                                        <a class="dropdown-item mb-1" href="#">
                                            <span>
                                                <i
                                                    class="far fa-arrow-alt-down mr-2"
                                                ></i>
                                            </span>
                                            <span>
                                                <p class="dd-p">Download PDF</p>
                                            </span>
                                        </a>
                                        <a
                                            @click="getShares('id_perfil_medico', item.id_perfil_medico)"
                                            class="dropdown-item mb-1"
                                            href="#"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#compartirUsuarios"
                                        >
                                            <span>
                                                <i
                                                    class="far fa-share-square mr-2"
                                                ></i>
                                            </span>
                                            <span>
                                                <p class="dd-p">Share</p>
                                            </span>
                                        </a>
                                        <a class="dropdown-item mb-1" href="#">
                                            <span>
                                                <i
                                                    class="fas fa-history mr-2"
                                                ></i>
                                            </span>
                                            <span>
                                                <p class="dd-p">View activity</p>
                                            </span>
                                        </a>
                                        <a
                                            @click="encapsulateId('id_perfil_medico', item.id_perfil_medico)"
                                            class="dropdown-item"
                                            href="#"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#eliminarperfil"
                                        >
                                            <span>
                                                <i
                                                    class="far fa-trash mr-2"
                                                ></i>
                                            </span>
                                            <span>
                                                <p class="dd-p">Delete</p>
                                            </span>
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
                        <ul class="pagination"></ul>
                    </nav>
                </div>

                <div class="d-flex justify-content-between" v-else>
                    <h4 class="mt-2">Page {{ pag }}</h4>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li
                                class="page-item"
                                v-show="pag != 1"
                                @click.prevent="pag -= 1"
                            >
                                <a class="button button--small" href="#"
                                    >Back</a
                                >
                            </li>

                            <li
                                class="page-item"
                                v-show="pag * NUM_RESULTS / show.length < 1"
                                @click.prevent="pag += 1"
                            >
                                <a class="button button--small" href="#"
                                    >Next</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Tab pane perfiles -->

            <!-- cards de perfiles compartidos -->
            <div class="tab-pane" id="compartidos" role="tabpanel">
                <div
                    class="card profile-card my-5 text-center text-sm-left"
                    v-for="(item, index) in ShowShared"
                    v-show="(pagC - 1) * NUM_RESULTSC <= index  && pagC * NUM_RESULTSC > index"
                >
                    <div class="row no-gutters">
                        <div class="col-sm-3">
                            <img
                                :src="getProfilePhoto(item.foto)"
                                class="card-img img-fluid"
                                :alt="item.nombres"
                            />
                        </div>
                        <div class="col-sm-9">
                            <div class="card-body">
                                <h5
                                    class="card-title text-regular"
                                    v-if="item.nombres === null"
                                >
                                    Complete your name.
                                </h5>
                                <h5 class="card-title text-regular" v-else>
                                    {{ item.nombres }} {{ item.apellidos }}
                                </h5>
                                <p
                                    class="card-text"
                                    v-if="item.date_part === null"
                                >
                                    Complete the information.
                                </p>
                                <p class="card-text" v-else>
                                    {{ item.date_part }} years, {{ item.nombre
                                    }}, {{ item.ciudad }}
                                </p>
                                <div class="d-flex flex-column d-sm-block">
                                    <a
                                        href="#"
                                        class="color-text text-link mr-4 mb-3"
                                    >
                                        <i class="far fa-eye mr-2"></i>
                                        View</a
                                    >
                                    <a
                                        href="#"
                                        class="color-text text-link mr-4 mb-3"
                                    >
                                        <i class="far fa-clone mr-2"></i>
                                        Save</a
                                    >
                                    <a
                                        href="#"
                                        class="color-text text-link mr-4 mb-3"
                                        id="dropdownMenuOffset"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-offset="0,5"
                                    >
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div
                                        class="dropdown-menu profile-more-options"
                                        aria-labelledby="dropdownMenuOffset"
                                    >
                                        <a class="dropdown-item mb-1" href="#">
                                            <span>
                                                <i class="far fa-arrow-alt-down"></i>
                                            </span>
                                            <span>
                                                <p class="dd-p">
                                                    Download PDF
                                                </p>
                                            </span>
                                        </a>
                                        <a
                                            @click="encapsulateId('id_perfil_medico', item.id_perfil_medico)"
                                            class="dropdown-item"
                                            href="#"
                                            type="button"
                                            data-toggle="modal"
                                            data-target="#eliminarperfilcompartido"
                                        >
                                        <span>
                                            <i class="far fa-trash"></i>
                                        </span>
                                            <span>
                                                <p class="dd-p">
                                                    Delete
                                                </p>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- paginacion de perfiles compartir -->
                <div
                    class="d-flex justify-content-between"
                    v-if="ShowShared == ''"
                >
                    <h4 class="mt-2"></h4>
                    <nav aria-label="...">
                        <ul class="pagination"></ul>
                    </nav>
                </div>

                <div class="d-flex justify-content-between" v-else>
                    <h4 class="mt-2">Page {{ pagC }}</h4>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li
                                class="page-item"
                                v-show="pagC != 1"
                                @click.prevent="pagC -= 1"
                            >
                                <a class="button button--small" href="#"
                                    >Back</a
                                >
                            </li>

                            <li
                                class="page-item"
                                v-show="pagC * NUM_RESULTSC / ShowShared.length < 1"
                                @click.prevent="pagC += 1"
                            >
                                <a class="button button--small" href="#"
                                    >Next</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Tab pane compartir -->
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
        <div
            class="modal fade"
            ref="shareModal"
            id="compartirUsuarios"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5
                            class="text-header-modal"
                            id="exampleModalCenterTitle"
                        >
                            Share the profile
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            You can share the medical profile with a specific person, but it must be a user of the platform.
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                User's email to be shared
                            </small>
                        </p>
                        <div class="input-group mb-4">
                            <input
                                class="textfield"
                                type="email"
                                class="form-control"
                                id="email"
                                aria-describedby="basic-addon3"
                                ref="email"
                            />
                            <div class="line"></div>
                        </div>
                        <div class="d-flex row mb-4">
                            <div class="col-9">
                                <p
                                    class="text-left pl-3 mt-0 mr-auto"
                                    :class="textColor"
                                >
                                    {{ sharingStatus }}
                                </p>
                            </div>
                            <div class="col-3 text-right">
                                <button
                                    @click="shareProfileWith()"
                                    type="button"
                                    class="btn"
                                    style="
                                        font-weight: 600;
                                        color: black;
                                        border-color: #dde3f0;
                                    "
                                >
                                    Invite
                                </button>
                            </div>
                        </div>
                        <div>
                            <p class="card-text" class="mb-3">
                                <small class="text-muted"
                                    >Manage who has access</small
                                >
                            </p>
                            <div
                                :class="'overflow-auto' + upperSpace"
                                style="height: 130px; max-height: 130px"
                            >
                                <div
                                    class="d-flex justify-content-center"
                                    v-if="!sharedWith.length"
                                    v-html="loading"
                                ></div>
                                <div
                                    v-else="sharedWith.length"
                                    v-cloak
                                    id="users"
                                    class="p-4 d-flex justify-content-between sharedProfileUser"
                                    v-for="user in sharedWith"
                                >
                                    <p>
                                        {{ user.nombres }} {{ user.apellidos
                                        }}
                                    </p>
                                    <p class="mr-5" style="color: grey">
                                        {{ user.email }}
                                    </p>
                                    <i
                                        @click="deleteSharing('id_usuario', user.id_usuario)"
                                        class="far fa-trash mt-1 text-link"
                                        style="color: grey; cursor: pointer"
                                    ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="modal-footer border-0 d-flex justify-content-between"
                    >
                        <small class="text-muted">
                            <a
                                href=""
                                style="
                                    text-decoration: none;
                                    font-weight: 600;
                                    color: grey;
                                "
                                data-dismiss="modal"
                                data-toggle="modal"
                                data-target="#exampleModalCenter"
                                >Share link</a
                            >
                        </small>
                        <button
                            type="button"
                            class="btn btn-primary"
                            style="font-weight: 600"
                            data-dismiss="modal"
                        >
                            Accept
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal eliminar perfil -->
        <div
            class="modal fade"
            id="eliminarperfil"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5
                            class="text-header-modal"
                            id="exampleModalCenterTitle"
                        >
                            Delete profile
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure you want to delete this profile? Once deleted you cannot recover it
                        </p>
                    </div>
                    <div
                        class="modal-footer border-0 d-flex justify-content-end"
                    >
                        <button
                            @click="deleteProfile('Own')"
                            type="button"
                            class="btn"
                            style="
                                font-weight: 600;
                                color: black;
                                border-color: #dde3f0;
                            "
                        >
                            {{ deleteText }}
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            style="font-weight: 600"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal eliminar perfil compartido-->
        <div
            class="modal fade"
            id="eliminarperfilcompartido"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5
                            class="text-header-modal"
                            id="exampleModalCenterTitle"
                        >
                            Delete shared profile
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure you want to delete this profile? You will lose access to view it, but the profile will still be available to the owner.
                        </p>
                    </div>
                    <div
                        class="modal-footer border-0 d-flex justify-content-end"
                    >
                        <button
                            @click="deleteProfile('Shared')"
                            type="button"
                            class="btn"
                            style="
                                font-weight: 600;
                                color: black;
                                border-color: #dde3f0;
                            "
                        >
                            {{ deleteText }}
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            style="font-weight: 600"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal compartir codigo QR -->
    <div
        data-backdrop="static"
        class="modal fade"
        ref="shareModal"
        id="compartirQr"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <!--<h5 class="text-header-modal" id="exampleModalCenterTitle">Compartir tu codigo QR</h5>-->
                    <button
                        v-if="showButtonModal"
                        @click="showModal = true"
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div>
                        <img
                            style="width: 100%; margin: auto; height: 30px"
                            src="<?=HOME_PATH ?>resources/images/for-light-bg.svg"
                            width="150"
                            height="70"
                            alt="Emergencia.id"
                        />
                        <small class="d-flex justify-content-center mt-2"
                            >You can use this QR Code to scan the information of this profile.</small
                        >
                        <span
                            style="color: #2f8deb"
                            class="d-flex justify-content-center mt-2"
                        >
                            {{ nameModal }}</span
                        >
                        <small class="d-flex justify-content-center mt-2">
                            {{ edadModal }} years, {{ ciudadModal }}</small
                        >
                        <img :src="srcImage" class="img-fluid" alt="" />
                    </div>
                </div>
                <div
                    class="modal-footer border-0 d-flex justify-content-between"
                >
                    <small class="text-muted">
                        <a
                            href=""
                            style="
                                text-decoration: none;
                                font-weight: 600;
                                color: grey;
                            "
                            data-dismiss="modal"
                            data-toggle="modal"
                            data-target="#exampleModalCenter"
                        ></a>
                    </small>
                    <button
                        v-if="showButtonModal"
                        @click="dowloadQR"
                        type="button"
                        class="btn btn-primary"
                        style="font-weight: 600"
                    >
                        Download code
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
template::footerSite("dashboardUser.js");
?>
