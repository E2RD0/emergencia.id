<?php
namespace Helpers;

class Url
{
    public static function redirect($page)
    {
        header('Location:' . HOST_NAME . HOME_PATH . $page);
        exit();
    }
}
