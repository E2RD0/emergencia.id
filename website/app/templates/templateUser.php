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
            <link rel="stylesheet" href="../../public/icons/css/all.min.css">

            <meta name="theme-color" content="#fafafa">
        </head>

        <body class="app">
            <nav class="navbar navbar-light bg-white">
                <img class="ml-3" src="../../public/images/for-light-bg.svg" width="150" height="70" alt="Emergencia.id">
                <div class="d-flex align-items-center mr-3">
                    <a href="dashboardCliente.php" class="color-text text-link mr-lg-5">Mis perfiles</a>
                    <div class="dropdown dropdown-nav-options">
                        <a href="#" class="font-size-regular btn dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Eduardo Estrada</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item font-size-regular" href="configurarCuenta.php">Ajustes de cuenta</a>
                            <a class="dropdown-item font-size-regular" href="login.php">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </nav>
        <?php
    }

    public static function headerCreate($titleDash)
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
            <div class="mt-5"></div>
            <?php
        }

        public static function footerSite()
        {
            ?>
                <!--Here copy the footer of the dashboard site-->
            </body>

            <!-- <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script> -->
            <script src="../../public/js/vendor/jquery-3.5.0.min.js"></script>
            <script src="../../public/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="../../public/js/plugins.js"></script>
            <script src="../../public/js/main.js"></script>

            </html>
    <?php

        }
    }

    ?>
