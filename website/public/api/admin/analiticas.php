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
            case 'getCountries':
                $result = $controller->getCountries();
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