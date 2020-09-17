<?php
require_once 'templates/templateUser.php';
template::headerSite('Dashboard');
?>

<div id="dashboard">
    <div class="container mt-5" id="dashboard">
        <h1 class="title-page mb-5">Gráficos</h1>
        <div class="row">
            <div class="col-md-6 text-center p-5">
                <h4>Tipo de sangre</h2>
                <form class="form-group text-left" action="" method="post" id="tipoSangreForm">
                    <label class="text-target">Donante</label>
                    <select class="textfield bg-white" id="tipoSangre" name="select">
                        <option selected="selected" value="">Seleccionar</option>
                        <option value="1">Es donador</option>
                        <option value="2">No es donador</option>
                        <option value="3">No especificado</option>
                    </select>
                </form>
                <canvas id="graficoTipoSangre"   width="400" height="300"></canvas>
            </div>
            <div class="col-md-6 text-center p-5">
                <h4>Perfiles médicos según país</h2>
                <form class="form-group text-left" action="" method="post" id="perfilesPaisForm">
                    <label class="text-target">País</label>
                    <select class="textfield bg-white" id="inputPais" name="select">
                        <option selected="selected" value="">Seleccionar</option>
                    </select>
                </form>
                <canvas id="graficoPerfilesPais"   width="400" height="300"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center p-5">
                <h4>Registro de perfiles médicos/fecha</h2>
                <form class="form-group text-left" action="" method="post" id="perfilesFechaForm">
                    <label class="text-target">Fecha de inicio</label>
                    <p class="form-error-label" id="errorPerfilesFecha"></p>
                    <input class="textfield bg-white" name="fechaInicio" type="date" id="inputFechaInicio" required>
                    <label class="text-target">Fecha final</label>
                    <input class="textfield bg-white" name="fechaFin" type="date" id="inputFechaFin" required>

                </form>
                <canvas id="graficoPerfilesFecha"   width="400" height="300"></canvas>
            </div>
            <div class="col-md-6 text-center p-5">
                <h4>Gráfico</h2>
                <canvas id=""   width="400" height="300"></canvas>
            </div>
        </div>

    </div>
</div>
<?php
template::footerSite("dashboard.js");
?>
