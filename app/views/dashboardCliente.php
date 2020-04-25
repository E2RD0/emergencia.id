<?php
require_once '../templates/templateUser.php';
template::headerSite('Dashboard del cliente');
?>

<main>

</main>
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6 text-left">
            <h1 class="text-regular">Perfiles</h1>
        </div>
        <div class="col-lg-6 text-right">
            <button type="button" class="btn btn-primary"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAWUlEQVRIS2NkoDFgpLH5DERZ8P/////YHMLIyEhQP0EFIINHLSAYz6NBBA4iXMFAMPxwKIAlYXgyHbUAPaSGYRDhSy2jGY1gXhoNooEPIoIuwKOAqDqZEgsAA7JQGZHFfiIAAAAASUVORK5CYII="/> Nuevo perfil</button>
        </div>
    </div>
    <hr>
    <div class="row container-fluid mt-5">
        <div class="card mb-3 card border-0 card bg-light" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../../public/images/default-perfil.svg" class="card-img img-fluid" alt="defaultPerfil">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-regular">Eduardo Estrada</h5>
                        <p class="card-text"><small class="text-muted">18 años, San salvador, El salvador.</small></p>
                        <a href="" class="text-link mr-4" style="color:black"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA1klEQVRIS8WTvRHCMAxGXzagYg8KBmASYBAoYABqKmAHtqBhBEZgAzjdOXdOTv6RTA61Tt77ZMkdE1c3MZ9WwS4EPKaCtggEfgjgPaBKvIIlcAfmUXJV4hHMgDcwlkgHIhmUVbABTsAKeEaSswYXk0Ug8EuIJx3EkkfrkGN4zxLJAnjlVr2mAw0uzBsgZ9kqCa7AWiFUwUszaIbnBD+BpwQp+BaQM1NpM/goBBc81cFY4IbXCJrgpS0y3XXrS3bLSg/NDe5/rN0ii2jA/IvAkrb47eQz+AL6iyUZyr1/fAAAAABJRU5ErkJggg==" /> Editar</a>
                        <a href="" class="text-link mr-4" style="color:black"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAu0lEQVRIS9WV0Q3CMAwFrxMwQssmjFImg1E6CmzABq2MlMqpFBNHsYB+2z4/u34ZCP6G4PrUAFZnEw/gCiySFwGQugI51wKcAkiK383XKOgGuAA3YHJWzGYOZQUSODqLp/B95hYgm50DdMwr7uCrAAveRcF/Aj5ZRLqh5hGFA/Sf+lM7yE5Ie5Gny1p1mdn1OrQmBZZzmI3pEb2Ak8ODdOiz5MIaIHZ9b3BUKT6nJ/LYYMSDU9xB43TstA1qhjsZhA2lRwAAAABJRU5ErkJggg==" /> Duplicar</a>
                        <a href="" class="text-link mr-4" style="color:black" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAdUlEQVRIS2NkoDFgpLH5DKMWEAzh0SAaoUHkwMDAMB/q90QGBoYDUDap4mBt2FLRAwYGBnmooSC2IhKbFHGcFnxgYGDghxr6kIGBQQHKJlUcpwWgoFgANTQBLYhIEcdpAcGkR4qC0ZxMMLRGg2g0iAiGAEEFAE2TGBnGAXeuAAAAAElFTkSuQmCC" /></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA2UlEQVRIS+2U0RXBQBBFbzrQCSpAB1SgBFSACihBB5RAB3SiA87gY4zszizyl/3JOcnLuzNvJqlo+FQN+9MC3IRTEXWADTB+ORyABXB1HY0gBTgDXaOVe/1/AKTqfcJoAkg3cm4O7FF8XQcrYJl4eQ3I858A0Q5CaZXM4AL0Qq5KlNuirdmiec0W5eaQnEFJkV8BZAYzYGhIR0CGLNfwsRHtgKnztt4kF6QBue2xRiPVSSqmjxlI6wO3pKfgpCIMA7wv07JDv3otahwQTKdMFmqzzPJd3QLc9O6V+iEZecKP3wAAAABJRU5ErkJggg=="/> Targeta QR</a>
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAr0lEQVRIS+2V2w2CQBBFDxVgB9gB2gGdSGnaiR2gHWgHUoHkJrOJEJZdXvED5pfNOTt3BkhYuZKV+WxP8LVIozuPPmjgXRBc2o1H5Gv/Clw84d2AsvOsxfld06F8H0DeAT2BU494kuAAvIDUgDVwBD5LCcTRbSsDngF11VeTOnAgl7fm4qtZguCLAvxPoIG5IcbcdOjM25ag9cMpAGWbzaQLrlndxRn7uR7t3gXByBosDCQZTHumtQAAAABJRU5ErkJggg=="/> Descargar PDF</a>
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABPElEQVRIS+2U4U0DMQxGXyeADYAJgAmACYAJygiwASMwAmwAEwAbwAZsACNUT7JRmuYuV6kn8YOTIp0S28+f7WTBzN9i5vj8CcA+8BpKT7dV3FOQwU8icM9+gz/mUAfXeWeAMvgncLxLBXXwc+A7AF+A6w14AT56Paklt4L/RKBUUcYUdg88DYFKwFDw0lcbG34V6yAOVXId6tZYJUDZZ4A1tyxm3vsEqUB12l/UZWsBzEbDKQATUNUjcBkKvCu/vnWJVGE220IE6aOv/bhJ6a0mtyDPkWHdYPdzolSS03aU/WhdHA1rSDoO9cRpuovGL+P/Yexm1pDWU+Gew3AL5DRZe33f42z06peQoZLmvjU3473YmATICcly9d6iQ8CerD0rUx6vVCIgSzXUiw3bKYDeZRs9/wd0yzd7iVZp5UQZs5FosQAAAABJRU5ErkJggg=="/> Compartir</a>
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAj0lEQVRIS2NkoDFgpLH5DMRYkMDAwDAfh0MSGRgYFuBzJCELDBgYGM4T8KUhAwPDBVxq0C34T6Ugg5tLdwuo5AGEMbjigNygwjBv1AL0OBsNIoKpeDSIRoMIEQI0L4s+MDAw8BMMcVQFDxkYGBQIZm2oAgdoVShPpCUgw0FV6wFiLSDSXMLKCNXJhE0goAIANrMYGYJl1qkAAAAASUVORK5CYII="/> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row container-fluid mt-5">
        <div class="card mb-3 card border-0 card bg-light" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../../public/images/default-perfil.svg" class="card-img img-fluid" alt="defaultPerfil">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-regular">José Roberto Estrada</h5>
                        <p class="card-text"><small class="text-muted">54 años, San salvador, El salvador.</small></p>
                        <a href="" class="text-link mr-4" style="color:black"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA1klEQVRIS8WTvRHCMAxGXzagYg8KBmASYBAoYABqKmAHtqBhBEZgAzjdOXdOTv6RTA61Tt77ZMkdE1c3MZ9WwS4EPKaCtggEfgjgPaBKvIIlcAfmUXJV4hHMgDcwlkgHIhmUVbABTsAKeEaSswYXk0Ug8EuIJx3EkkfrkGN4zxLJAnjlVr2mAw0uzBsgZ9kqCa7AWiFUwUszaIbnBD+BpwQp+BaQM1NpM/goBBc81cFY4IbXCJrgpS0y3XXrS3bLSg/NDe5/rN0ii2jA/IvAkrb47eQz+AL6iyUZyr1/fAAAAABJRU5ErkJggg==" /> Editar</a>
                        <a href="" class="text-link mr-4" style="color:black"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAu0lEQVRIS9WV0Q3CMAwFrxMwQssmjFImg1E6CmzABq2MlMqpFBNHsYB+2z4/u34ZCP6G4PrUAFZnEw/gCiySFwGQugI51wKcAkiK383XKOgGuAA3YHJWzGYOZQUSODqLp/B95hYgm50DdMwr7uCrAAveRcF/Aj5ZRLqh5hGFA/Sf+lM7yE5Ie5Gny1p1mdn1OrQmBZZzmI3pEb2Ak8ODdOiz5MIaIHZ9b3BUKT6nJ/LYYMSDU9xB43TstA1qhjsZhA2lRwAAAABJRU5ErkJggg==" /> Duplicar</a>
                        <a href="" class="text-link mr-4" style="color:black" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,5"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAdUlEQVRIS2NkoDFgpLH5DKMWEAzh0SAaoUHkwMDAMB/q90QGBoYDUDap4mBt2FLRAwYGBnmooSC2IhKbFHGcFnxgYGDghxr6kIGBQQHKJlUcpwWgoFgANTQBLYhIEcdpAcGkR4qC0ZxMMLRGg2g0iAiGAEEFAE2TGBnGAXeuAAAAAElFTkSuQmCC" /></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA2UlEQVRIS+2U0RXBQBBFbzrQCSpAB1SgBFSACihBB5RAB3SiA87gY4zszizyl/3JOcnLuzNvJqlo+FQN+9MC3IRTEXWADTB+ORyABXB1HY0gBTgDXaOVe/1/AKTqfcJoAkg3cm4O7FF8XQcrYJl4eQ3I858A0Q5CaZXM4AL0Qq5KlNuirdmiec0W5eaQnEFJkV8BZAYzYGhIR0CGLNfwsRHtgKnztt4kF6QBue2xRiPVSSqmjxlI6wO3pKfgpCIMA7wv07JDv3otahwQTKdMFmqzzPJd3QLc9O6V+iEZecKP3wAAAABJRU5ErkJggg=="/> Targeta QR</a>
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAr0lEQVRIS+2V2w2CQBBFDxVgB9gB2gGdSGnaiR2gHWgHUoHkJrOJEJZdXvED5pfNOTt3BkhYuZKV+WxP8LVIozuPPmjgXRBc2o1H5Gv/Clw84d2AsvOsxfld06F8H0DeAT2BU494kuAAvIDUgDVwBD5LCcTRbSsDngF11VeTOnAgl7fm4qtZguCLAvxPoIG5IcbcdOjM25ag9cMpAGWbzaQLrlndxRn7uR7t3gXByBosDCQZTHumtQAAAABJRU5ErkJggg=="/> Descargar PDF</a>
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABPElEQVRIS+2U4U0DMQxGXyeADYAJgAmACYAJygiwASMwAmwAEwAbwAZsACNUT7JRmuYuV6kn8YOTIp0S28+f7WTBzN9i5vj8CcA+8BpKT7dV3FOQwU8icM9+gz/mUAfXeWeAMvgncLxLBXXwc+A7AF+A6w14AT56Paklt4L/RKBUUcYUdg88DYFKwFDw0lcbG34V6yAOVXId6tZYJUDZZ4A1tyxm3vsEqUB12l/UZWsBzEbDKQATUNUjcBkKvCu/vnWJVGE220IE6aOv/bhJ6a0mtyDPkWHdYPdzolSS03aU/WhdHA1rSDoO9cRpuovGL+P/Yexm1pDWU+Gew3AL5DRZe33f42z06peQoZLmvjU3473YmATICcly9d6iQ8CerD0rUx6vVCIgSzXUiw3bKYDeZRs9/wd0yzd7iVZp5UQZs5FosQAAAABJRU5ErkJggg=="/> Compartir</a>
                                    <a class="dropdown-item" href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAj0lEQVRIS2NkoDFgpLH5DMRYkMDAwDAfh0MSGRgYFuBzJCELDBgYGM4T8KUhAwPDBVxq0C34T6Ugg5tLdwuo5AGEMbjigNygwjBv1AL0OBsNIoKpeDSIRoMIEQI0L4s+MDAw8BMMcVQFDxkYGBQIZm2oAgdoVShPpCUgw0FV6wFiLSDSXMLKCNXJhE0goAIANrMYGYJl1qkAAAAASUVORK5CYII="/> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    template::footerSite();
    ?>