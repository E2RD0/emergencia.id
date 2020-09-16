<?php

namespace Common;

//base class for controllers; it loads models and views
class Controller
{
    //load a model
    public function loadModel($nameModel)
    {
        require_once __DIR__ . '/../../models/' . $nameModel . '.php';
        return new $nameModel();
    }

    public function loadView($context, $nameView, $loginRequired = true, $data = [])
    {
        $pathFile = __DIR__ . '/../../views/' . $context . '/' . $nameView . '.php';
        //If the file exists
        if (file_exists($pathFile)) {
            if(!isset($_SESSION))
                session_start();
            $loggedInAdmin = isset($_SESSION['p_user_id']);
            $loggedInClient = isset($_SESSION['user_id']);

            if ($context == 'admin') {
                if ($loginRequired === true) {
                    if (!$loggedInAdmin) { //If not logged in
                        \Helpers\Url::redirect('admin/user/login'); //redirect to login
                    }
                } elseif ($loginRequired === -1) { //if login is NOT required and page should not be accessible when logged in
                    if ($loggedInAdmin) { //if logged in
                        \Helpers\Url::redirect('admin/dashboard'); //redirect to admin home
                    }
                }
            } elseif ($context == 'app') {
                if ($loginRequired === true) {
                    if (!$loggedInClient) { //if not logged in
                        \Helpers\Url::redirect('app/user/login'); //redirect to login
                    }
                } elseif ($loginRequired === -1) { //if login is NOT required and page should not be accessible when logged in
                    if ($loggedInClient) {
                        \Helpers\Url::redirect('app/user/profiles'); //redirect to user home
                    }
                }
            }
            require_once $pathFile;
        } else {
            Core::http404();
        }
    }
}
