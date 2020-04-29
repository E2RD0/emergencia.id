<?php

class template
{
    public static function headerLogin($title)
    {
?>
        <!--Here copy the header-->
        <!doctype html>
        <html class="no-js" lang="es">

        <head>
            <meta charset="UTF-8">
            <title><?php echo $title ?></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!--<link rel="manifest" href="site.webmanifest">-->
            <link rel="apple-touch-icon" href="icon.png">

            <link rel="stylesheet" href="../../public/webfonts/stylesheet.css">
            <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../public/css/normalize.css">
            <link rel="stylesheet" href="../../public/css/main.css">

            <meta name="theme-color" content="#fafafa">
        </head>

        <body>
        <?php
    }

    public static function footerLogin()
    {
        ?>
            <!--Here copy the footer-->
        </body>

        <script src="../../public/js/vendor/jquery-3.5.0.min.js"></script>
        <script src="../../public/js/vendor/bootstrap.min.js"></script>
        <script src="../../public/js/plugins.js"></script>
        <script src="../../public/js/main.js"></script>

        </html>

    <?php
    }

    /**
     * Se crean otras funciones en esta misma clase ya que se van a necesitar diferentes templates para
     * el inicio de sesión, el sitio, etc (compartiran los mismos estilos, pero diferente estructura).
     **/

    public static function headerSite($titleDash)
    {
    ?>
        <!--Here copy the header of the dashboard site-->
        <!doctype html>
        <html class="no-js" lang="es">

        <head>
            <meta charset="UTF-8">
            <title><?php echo $titleDash ?></title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!--<link rel="manifest" href="site.webmanifest">-->
            <link rel="apple-touch-icon" href="icon.png">

            <link rel="stylesheet" href="../../public/webfonts/stylesheet.css">
            <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../public/css/normalize.css">
            <link rel="stylesheet" href="../../public/css/main.css">
            <link rel="stylesheet" href="../../public/icons/css/all.css">

            <meta name="theme-color" content="#fafafa">
        </head>

        <body style="background-color: #F2F5FA">
            <nav class="navbar navbar-light bg-white">
                <img class="ml-4" src="../../public/images/for-light-bg.svg" width="150" height="70" alt="">
                <form class="form-inline">
                    <a href="" type="button" style="color:black" class="text-link mr-lg-5">Mis perfiles</a>
                    <div class="verticalLine">
                        .
                    </div>
                    <div class="dropdown">
                        <a href="#" style="box-shadow: none" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eduardo Estrada</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Ajustes de cuenta</a>
                            <a class="dropdown-item" href="#">Cerrar Sesión</a>
                        </div>
                    </div>
                </form>
            </nav>
        <?php
    }

    public static function footerSite()
    {
        ?>
            <!--Here copy the footer of the dashboard site-->
        </body>

        <!-- <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script> -->
        <script src="../../public/js/vendor/jquery-3.5.0.min.js"></script>
        <script src="../../public/js/vendor/bootstrap.min.js"></script>
        <script src="../../public/js/plugins.js"></script>
        <script src="../../public/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        </html>
        <?php

    }
}

?>
