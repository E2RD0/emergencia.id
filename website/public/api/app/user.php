<?php

require_once __DIR__ . '/../../../backend/init.php';
require_once __DIR__ . '/../../../backend/controllers/Users.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \Users;
    $result = $controller->r;


    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'logout':
                $result = $controller->logout();
                break;
            case 'info':
                $result = $controller->getUserInfo();
                break;
            case 'update':
                $result = $controller->updateUser($_POST);
                break;
            default:
                \Common\Core::http404();
        }
    }
    else {
        switch ($action) {
            case 'signup':
                $result = $controller->signUp($_POST);
                break;
            case 'login':
                $result = $controller->login($_POST);
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
    }
    header('content-type: application/json; charset=utf-8');
	echo json_encode($result);
}
else {
    \Common\Core::http404();
}
