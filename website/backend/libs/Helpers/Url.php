<?php
namespace Helpers;

class Url
{
    public static function redirect($page)
    {
        header('Location:http://localhost' . HOME_PATH . $page);
        exit();
    }
}
