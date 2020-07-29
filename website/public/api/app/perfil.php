<?php

require_once __DIR__ . '/../../../backend/init.php';
require_once __DIR__ . '/../../../backend/controllers/Profile.php';

if (isset($_GET['action'])) {
    #session_start();
    $action = $_GET['action'];
    $controller = new \Profile;
    $result = $controller->r;

    switch ($action) {
        case 'test':
            $result = $controller->getProfile();
            break;
        case 'getBlood':
            $result = $controller->getBlood();
            break;
        case 'recoverPassword':
            $result = $controller->recoverPassword($_POST);
            break;
        case 'recoverCode':
            $result = $controller->recoverCode($_POST);
            break;
        default:
            \Common\Core::http404();
    }
    
    header('content-type: application/json; charset=utf-8');
	echo json_encode($result, JSON_PRETTY_PRINT);
}
else {
    \Common\Core::http404();
}