<?php
header("Access-Control-Allow-Origin: *");
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
            case 'infoWithParameters':
                $result = $controller->getUserInfoParameter();
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
            case '2fa':
                $result = $controller->twoFactorAuth($_POST, false);
                break;
            case 'save2fa':
                $result = $controller->save2fa($_POST['secret'], $_SESSION['user_id']);
                break;

            default:
                \Common\Core::http404();
        }
    } else {
        switch ($action) {
            case 'signup':
                $result = $controller->signUp($_POST);
                break;
                case 'intentos':
                    $result = $controller->update();
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
            case 'newPassword':
                $result = $controller->newPassword($_POST);
                break;
            case '2fa-login':
                $result = $controller->twoFactorAuthLogin($_POST);
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
