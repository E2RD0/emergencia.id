<?php
require_once '../templates/templateUser.php';
template::headerSite('Dashboard del cliente');
?>

<main>

</main>
<div class="container">

    <div class="row mt-5 ml-lg-3 ml-sm-0">
        <div class="col-lg-10">
            <h1 class="text-regular">Perfiles</h1>
        </div>
        <div class="col-lg-2 mt-2">
            <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo perfil</button>
        </div>
    </div>
    <hr>

    <!-- card de perfiles -->
    <div class="card mb-3 card mb-3 card border-0 card mb-5 mt-5" style="max-width: 540px; background-color: #F2F5FA;">
        <div class="row no-gutters">
            <div class="col-md-3">
                <img src="../../public/images/default-perfil.svg" class="card-img img-fluid" alt="defaultPerfil">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title text-regular">Eduardo Estrada</h5>
                    <p class="card-text"><small class="text-muted">18 años, San salvador, El salvador.</small></p>
                        <a href="" class="text-link mr-4" style="color:black"><i class="far fa-pencil"></i> Editar</a>
                        <a href="" class="text-link mr-4" style="color:black"><i class="far fa-clone"></i> Duplicar</a>
                        <a href="" class="text-link mr-4" style="color:black" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="#"><i class="far fa-address-card mr-2"></i> Targeta QR</a>
                            <a class="dropdown-item" href="#"><i class="far fa-arrow-alt-down mr-2"></i> Descargar PDF</a>
                            <a class="dropdown-item" href="#"><i class="far fa-share-square mr-2"></i> Compartir</a>
                            <a class="dropdown-item" href="#"><i class="far fa-trash mr-2"></i> Eliminar</a>
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
                    <a href="" class="text-link mr-4" style="color:black"><i class="far fa-pencil"></i> Editar</a>
                        <a href="" class="text-link mr-4" style="color:black"><i class="far fa-clone"></i> Duplicar</a>
                        <a href="" class="text-link mr-4" style="color:black" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                        <a class="dropdown-item" href="#"><i class="far fa-address-card mr-2"></i> Targeta QR</a>
                            <a class="dropdown-item" href="#"><i class="far fa-arrow-alt-down mr-2"></i> Descargar PDF</a>
                            <a class="dropdown-item" href="#"><i class="far fa-share-square mr-2"></i> Compartir</a>
                            <a class="dropdown-item" href="#"><i class="far fa-trash mr-2"></i> Eliminar</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
template::footerSite();
?>