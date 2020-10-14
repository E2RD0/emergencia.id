<?php
header("Access-Control-Allow-Origin: *");
require_once __DIR__ . '/../../../backend/init.php';
require_once __DIR__ . '/../../../backend/controllers/PUsers.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \PUsers;
    $result = $controller->r;

    if (isset($_SESSION['p_user_id'])) {
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
            case 'updatePassword':
                $result = $controller->updatePassword($_POST);
                break;
            case 'delete':
                $result = $controller->delete();
                break;
            default:
                \Common\Core::http404();
        }
    } else {
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
            case 'getAppProfileInfo':
                $result = $controller->getAppProfileInfo($_GET['id_user']);
                break;
            default:
                \Common\Core::http404();
        }
    }
    header('content-type: application/json; charset=utf-8');
    echo json_encode($result);
} else {
    \Common\Core::http404();
}
