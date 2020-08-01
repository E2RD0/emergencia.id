<?php

require_once __DIR__ . '/../../../backend/init.php';
require_once __DIR__ . '/../../../backend/controllers/ProfileUser.php';

if (isset($_GET['action'])) {
    session_start();
    $action = $_GET['action'];
    $controller = new \ProfileUser;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'errors' => []);

    if (isset($_SESSION['user_id'])) {
        switch ($action) {
            case 'getshowProfile':
                $result = $controller->getShowProfile($_SESSION['user_id'], $result);
                break;
            case 'getshowProfileShared':
                $result = $controller->getShowProfileShared($_SESSION['user_id'], $result);
                break;
            case 'deleteOwnProfile':
                $result = $controller->deleteProfile(array_merge($_POST,array('id_usuario'=>$_SESSION['user_id'])), $result);
                break;
            case 'deleteSharedProfile':
                $result = $controller->deleteSharedProfile(array_merge($_POST,array('id_usuario'=>$_SESSION['user_id'])), $result);
                break;
            case 'getUsersSharedWith':
                $result = $controller->getUsersSharedWith(array_merge($_POST,array('id_usuario'=>$_SESSION['user_id'])), $result);
                break;
            case 'shareProfileWith':
                $result = $controller->shareProfileWith(array_merge($_POST,array('id_usuario'=>$_SESSION['user_id'])), $result);
                break;
            default:
                \Common\Core::http404();
        }
    }

    header('content-type: application/json; charset=utf-8');
	echo json_encode($result, JSON_PRETTY_PRINT);
}
else {
    \Common\Core::http404();
}
