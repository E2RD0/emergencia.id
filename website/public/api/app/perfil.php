<?php

require_once __DIR__.'/../../../backend/init.php';
require_once __DIR__.'/../../../backend/controllers/Profile.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \Profile();
    $result = $controller->r;

    switch ($action) {
        case 'perfilesUsuario':
            $result = $controller->perfilesUsuario();
            break;
        case 'test':
            $result = $controller->getProfile();
            break;
        case 'newUser':
            $result = $controller->newUser($_POST);
            break;
        case 'getBlood':
            $result = $controller->getBlood();
            break;
        case 'getIssEstatus':
            $result = $controller->getIssEstatus();
            break;
        case 'getCountry':
            $result = $controller->getCountry();
            break;
        case 'getCity':
            $result = $controller->getCity($_GET['country']);
            break;
        case 'newProfile':
            $result = $controller->createNewProfile();
            break;
        case 'updateProfile':
            $result = $controller->updatePro($_POST);
            break;
        case 'showProfileAllInfo':
            $result = $controller->getInformation($_POST);
            break;
        case 'newContact':
            $result = $controller->crateContact($_POST);
            break;
        case 'showContact':
            $result = $controller->showContact($_POST);
            break;
        case 'addDoctor':
            $result = $controller->addDoctor($_POST);
            break;
        case 'getDoctor':
            $result = $controller->getDoctor($_POST);
            break;
        case 'getMedication':
            $result = $controller->getMedication($_POST);
            break;
        case 'addMedication':
            $result = $controller->addMedication($_POST);
            break;
        case 'addNewCondition':
            $result = $controller->addNCondition($_POST);
            break;
        case 'loadCondition':
            $result = $controller->loadCondition($_POST);
            break;
        case 'deleteContact':
            $result = $controller->deleteContact($_POST);
            break;
        case 'deleteContactDoctor':
            $result = $controller->deleteContactDoctor($_POST);
            break;
        case 'reporteCondicionesMedicas':
            $result = $controller->reporteCondicionesMedicas($_POST);
            break;
        case 'reporteContactosEmergencia':
            $result = $controller->reporteContactosEmergencia($_POST);
            break;
        case 'reporteContactosDoctor':
            $result = $controller->reporteContactosDoctor($_POST);
            break;
        case 'reporteMedicamentos':
            $result = $controller->reporteMedicamentos($_POST);
            break;
        case 'reporteInformacionPerfil':
            $result = $controller->reporteInformacionPerfil($_POST);
            break;
        case 'reportePerfilesUsuario':
            $result = $controller->reportePerfilesUsuario();
            break;
        default:
            \Common\Core::http404();
    }

    header('content-type: application/json; charset=utf-8');
    echo json_encode($result, JSON_PRETTY_PRINT);
} else {
    \Common\Core::http404();
}
