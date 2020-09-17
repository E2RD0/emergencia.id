<?php

require_once __DIR__ . '/../../../backend/init.php';
require_once __DIR__ . '/../../../backend/controllers/Analiticas.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \Analiticas;
    $result = $controller->r;

    if (isset($_SESSION['p_user_id'])) {
        switch ($action) {
            case 'graficoTipoSangre':
                $result = $controller->graficoTipoSangre($_POST);
                break;
            case 'graficoPerfilesPais':
                $result = $controller->graficoPerfilesPais($_POST);
                break;
            case 'graficoPerfilesFecha':
                $result = $controller->graficoPerfilesFecha($_POST);
                break;
                case 'graficoUsuariosPrivFecha':
                    $result = $controller->graficoUsuariosPrivFecha($_POST);
                    break;
                case 'graficoUsuariosFecha':
                    $result = $controller->graficoUsuariosFecha($_POST);
                    break;
            case 'getCountries':
                $result = $controller->getCountries();
                break;
            case 'reporteUsuariosPais':
                $result = $controller->reporteUsuariosPais($_SESSION['p_user_email']);
                break;
            case 'graficoCondicionMedica':
                $result = $controller->graficoParaCondicionMedica($_POST);
                break;
            case 'graficoProcedimientos':
                $result = $controller->graficoParaProcedimientoMedicoo($_POST);
                break;
            default:
                \Common\Core::http404();
        }
    }
    else {
        \Common\Core::http404();
    }
    header('content-type: application/json; charset=utf-8');
	echo json_encode($result);
}
else {
    \Common\Core::http404();
}