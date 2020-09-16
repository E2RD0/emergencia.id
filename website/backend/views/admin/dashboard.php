<?php
require_once 'templates/templateUser.php';
template::headerSite('Dashboard');
?>

<div id="dashboard">
    <div class="container mt-5" id="dashboard">
        <h1 class="title-page mb-5">Gráficos</h1>
        <div class="row">
            <div class="col-md-6 text-center p-5">
                <h4>Gráfico #1</h2>
                <canvas id="myChart"   width="400" height="300"></canvas>
            </div>
            <div class="col-md-6 text-center p-5">
                <h4>Gráfico #2</h2>
                <canvas id="myChart2" width="400" height="300"></canvas>
            </div>
        </div>

    </div>
</div>
<?php
template::footerSite("dashboard.js");
?>
