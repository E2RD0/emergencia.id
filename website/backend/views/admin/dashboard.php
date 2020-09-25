<?php
require_once 'templates/templateUser.php';
template::headerSite('Dashboard');
?>

<div id="dashboard">
    <div class="container mt-5" id="dashboard">
        <h1 class="title-page mb-3">Reports</h1>
        <div class="row">
            <div class="col-6">
                <h4 class="mb-3">Privileged users</h2>
                <button
                    onclick="report(this, 'reporteUsuariosPrivilegiados')"
                    class="button button--small"
                    role="button"
                >
                    <p class="d-inline-block my-0">Generate report</p>
                </button>
            </div>
            <div class="col-6">
                <h4 class="mb-3">Users per country</h2>
                <button
                onclick="report(this, 'reporteUsuariosPais')"
                class="button button--small"
                role="button"
                >
                    <p class="d-inline-block my-0">Generate report</p>
                </button>
            </div>
        </div>

        <h1 class="title-page mb-5">Charts</h1>
        <div class="row">
            <div class="col-md-6 text-center p-5">
                <h4>Blood type</h2>
                <form class="form-group text-left" action="" method="post" id="tipoSangreForm">
                    <label class="text-target">Organ donor</label>
                    <select class="textfield bg-white" id="tipoSangre" name="select">
                        <option selected="selected" value="">Select</option>
                        <option value="1">Is a donor</option>
                        <option value="2">Is not a donor</option>
                        <option value="3">Unknown</option>
                    </select>
                </form>
                <canvas id="graficoTipoSangre"   width="400" height="300"></canvas>
            </div>
            <div class="col-md-6 text-center p-5">
                <h4>Medical profiles by country</h2>
                <form class="form-group text-left" action="" method="post" id="perfilesPaisForm">
                    <label class="text-target">Country</label>
                    <select class="textfield bg-white" id="inputPais" name="select">
                        <option selected="selected" value="">Select</option>
                    </select>
                </form>
                <canvas id="graficoPerfilesPais"   width="400" height="300"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center p-5">
                <h4>Registration of medical profiles by date</h2>
                <form class="form-group text-left" action="" method="post" id="perfilesFechaForm">
                    <label class="text-target">Starting date</label>
                    <p class="form-error-label" id="errorPerfilesFecha"></p>
                    <input class="textfield bg-white" name="fechaInicio" type="date" id="inputFechaInicio" required>
                    <label class="text-target">Final date</label>
                    <input class="textfield bg-white" name="fechaFin" type="date" id="inputFechaFin" required>

                </form>
                <canvas id="graficoPerfilesFecha"   width="400" height="300"></canvas>
            </div>
            <div class="col-md-6 text-center p-5">
                <h4>Most used medication</h2>
                <canvas id="graficoTop5Medicamentos"   width="400" height="300"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-6 text-center p-5">
                <h4>Users registration by date</h2>
                <form class="form-group text-left" action="" method="post" id="perfilesFechaForm2">
                    <label class="text-target">Starting date</label>
                    <p class="form-error-label" id="errorPerfilesFecha"></p>
                    <input class="textfield bg-white" name="fechaInicio2" type="date" id="inputFechaInicio2" required>
                    <label class="text-target">Final date</label>
                    <input class="textfield bg-white" name="fechaFin2" type="date" id="inputFechaFin2" required>

                </form>
            </div>
            <div class="col-6 text-center p-5">
                <h4>Chart</h2>
                <canvas id="graficoPerfilesFecha2"   width="400" height="300"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-6 text-center p-5">
                <h4>Privileged Users registration by date</h2>
                <form class="form-group text-left" action="" method="post" id="perfilesFechaForm3">
                    <label class="text-target">Starting date</label>
                    <p class="form-error-label" id="errorPerfilesFecha"></p>
                    <input class="textfield bg-white" name="fechaInicio3" type="date" id="inputFechaInicio3" required>
                    <label class="text-target">Final date</label>
                    <input class="textfield bg-white" name="fechaFin3" type="date" id="inputFechaFin3" required>

                </form>
            </div>
            <div class="col-6 text-center p-5">
                <h4>Chart</h2>
                <canvas id="graficoPerfilesFecha3"   width="400" height="300"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center p-5">
                <h4>Most common medical conditions</h2>
                <canvas id="graficoCondicionMedica"   width="400" height="300"></canvas>
            </div>
            <div class="col-md-6 text-center p-5">
                <h4>Most common medical proceadures</h2>
                <canvas id="graficoProcedimiento"   width="400" height="300"></canvas>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center p-5">
                <h4>Number of users by ISSS status</h4>
                <canvas id="graficoEstadoUsuarios"   width="400" height="300"></canvas>
            </div>
        </div>

    </div>
</div>
<?php
template::footerSite("dashboard.js");
?>
