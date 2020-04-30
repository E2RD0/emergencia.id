<?php
require_once '../templates/templateUser.php';
template::headerSite('Dashboard del cliente');
?>

<main>

</main>
<div class="container">

    <div class="row mt-5 ml-sm-0">
        <div class="col-lg-10">
            <h1 class="text-regular">Perfiles</h1>
        </div>
    </div>
    <div class="line ml-0 ml-sm-3">
        <a class="navbar-brand" href="dashboardCliente.php" style="border-bottom: 3px solid #2F8DEB; text-decoration: none; color:black">Mis perfiles</a>
        <a class="navbar-brand" href="dashboardCompartir.php" style=" text-decoration: none; color:grey">Compartidos conmigo</a>
        <!-- btn escritorio -->
        <a href="" class="btn btn-primary float-right d-none d-sm-none d-md-block" role="button"><i class="fas fa-plus mr-2"></i>Nuevo perfil</a>
        <!-- btn movil -->
        <a href="" class="btn btn-primary float-right d-block d-sm-block d-md-none btn-lg btn-block" role="button"><i class="fas fa-plus mr-2"></i>Nuevo perfil</a>
    </div>


    <!-- card de perfiles -->
    <div class="card mb-3 card mb-3 card border-0 card mb-5 mt-5 pt-3" style="max-width: 540px; background-color: #F2F5FA;">
        <div class="row no-gutters">
            <div class="col-md-3">
                <img src="../../public/images/default-perfil.svg" class="card-img img-fluid" alt="defaultPerfil">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title text-regular">Eduardo Estrada</h5>
                    <p class="card-text"><small class="text-muted">18 años, San salvador, El salvador.</small></p>
                    <a href="" class="text-link mr-4" style="color:black"><i class="far fa-pencil mr-2"></i> Editar</a>
                    <a href="" class="text-link mr-4" style="color:black"><i class="far fa-clone mr-2"></i> Duplicar</a>
                    <a href="" class="text-link mr-4" style="color:black" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><i class="fas fa-ellipsis-h"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="#"><i class="far fa-address-card mr-2"></i> Targeta QR</a>
                        <a class="dropdown-item" href="#"><i class="far fa-arrow-alt-down mr-2"></i> Descargar PDF</a>
                        <a class="dropdown-item" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-share-square mr-2"></i> Compartir</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-history mr-2"></i></i> Ver actividad</a>
                        <a class="dropdown-item" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminarperfil"><i class="far fa-trash mr-2"></i> Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3 card mb-3 card border-0 card mb-5" style="max-width: 540px;background-color: #F2F5FA;">
        <div class="row no-gutters">
            <div class="col-md-3">
                <img src="../../public/images/default-perfil.svg" class="card-img img-fluid" alt="defaultPerfil">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title text-regular">José Roberto Estrada</h5>
                    <p class="card-text"><small class="text-muted">54 años, San salvador, El salvador.</small></p>
                    <a href="" class="text-link mr-4" style="color:black"><i class="far fa-pencil mr-2"></i> Editar</a>
                    <a href="" class="text-link mr-4" style="color:black"><i class="far fa-clone mr-2"></i> Duplicar</a>
                    <a href="" class="text-link mr-4" style="color:black" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><i class="fas fa-ellipsis-h"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="#"><i class="far fa-address-card mr-2"></i> Targeta QR</a>
                        <a class="dropdown-item" href="#"><i class="far fa-arrow-alt-down mr-2"></i> Descargar PDF</a>
                        <a class="dropdown-item" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-share-square mr-2"></i> Compartir</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-history mr-2"></i></i> Ver actividad</a>
                        <a class="dropdown-item" href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminarperfil"><i class="far fa-trash mr-2"></i> Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- modal compartir perfil -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="text-header-modal" id="exampleModalCenterTitle">Compartir el perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Con este enlace pudes compartir la informacion del perfil médico para casos que no sean emergencias(compartirlo con tu doctor,etc).</p>
                    <p class="card-text"><small class="text-muted">Copia el siguiente enlace</small></p>
                    <div class="input-group mb-4">
                        <input class="textfield" type="text" class="form-control" id="email" aria-describedby="basic-addon3">
                        <div class="line"></div>
                    </div>
                </div>
                <div class="modal-footer  border-0 d-flex justify-content-between">
                    <small class="text-muted"><a href="" style="text-decoration: none;font-weight: 600;color:grey" data-toggle="modal" data-target="#compartirperfil" data-dismiss="modal">Compartir con un usuario</a></small>
                    <button type="button" class="btn" style="background-color: white; color: #2F8DEB; font-weight: 600;">Abrir enclace</button>
                    <button type="button" class="btn btn-primary" style="font-weight: 600;">Copiar enlace</button>  
                </div>
            </div>
        </div>
    </div>

    <!-- modal compartir perfil con usuario -->
    <div class="modal fade" id="compartirperfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="text-header-modal" id="exampleModalCenterTitle">Compartir el perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Puedes compartir el perfil médico con una persona en específico que sea un usuario de la plataforma.</p>
                    <p class="card-text"><small class="text-muted">Correo electronico del usuario a compartir</small></p>
                    <div class="input-group mb-4">
                        <input class="textfield" type="text" class="form-control" id="email" aria-describedby="basic-addon3">
                        <div class="line"></div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn" style="font-weight: 600;color:black;border-color: #DDE3F0;">Invitar</button>  
                    </div>
                    <div>
                        <p class="card-text"><small class="text-muted">Gestiona quién tiene acceso</small></p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p>Laura Navas</p>
                            <p class="mr-5" style="color:grey">lauranavas@gmail.com</p>
                            <i class="far fa-trash mt-1" style="color: grey"></i>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer  border-0 d-flex justify-content-between">
                    <small class="text-muted"><a href="" style="text-decoration: none;font-weight: 600;color:grey" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Compartir enlace</a></small>
                    <button type="button" class="btn btn-primary" style="font-weight: 600;" data-dismiss="modal">Aceptar</button>  
                </div>
            </div>
        </div>
    </div>

    <!-- modal eliminar perfil -->
    <div class="modal fade" id="eliminarperfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header  border-0">
                    <h5 class="text-header-modal" id="exampleModalCenterTitle">Eliminar perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro que quieres eliminar este perfil? Una vez eliminado no lo podras recuperar</p>
                </div>
                <div class="modal-footer  border-0 d-flex justify-content-end">
                <button type="button" class="btn" style="font-weight: 600;color:black;border-color: #DDE3F0;" data-dismiss="modal">Eliminar</button>
                    <button type="button" class="btn btn-primary" style="font-weight: 600;" data-dismiss="modal">Cancelar</button>  
                </div>
            </div>
        </div>
    </div>

    
</div>

<?php
template::footerSite();
?>