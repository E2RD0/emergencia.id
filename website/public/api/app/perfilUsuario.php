<?php

require_once __DIR__ . '/../../../backend/init.php';
require_once __DIR__ . '/../../../backend/controllers/ProfileUser.php';

if (isset($_GET['action'])) {
    #session_start();
    $action = $_GET['action'];
    $controller = new \ProfileUser;
    $result = $controller->r;

    switch ($action) {
        case 'getshowProfile':
            $result = $controller->getShowProfile();
        break;
        case 'getshowProfileShared':
            $result = $controller->getShowProfileShared();
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