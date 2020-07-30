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

            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/webfonts/stylesheet.css">
            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/normalize.css">
            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/main.css">

            <meta name="theme-color" content="#fafafa">
        </head>

        <body>
        <?php
    }

    public static function footerLogin(...$ajax)
    {
        ?>
            <!--Here copy the footer-->
        </body>

        <script src="<?= HOME_PATH ?>resources/js/vendor/jquery-3.5.0.min.js"></script>
        <script src="<?= HOME_PATH ?>resources/js/vendor/bootstrap.min.js"></script>
        <script src="<?= HOME_PATH ?>resources/js/plugins.js"></script>
        <script src="<?= HOME_PATH ?>resources/js/main.js"></script>
        <script> var HOST_NAME = "<?= HOST_NAME ?>" </script>
        <script> var HOME_PATH = "<?= HOME_PATH ?>" </script>
        <script src="<?= HOME_PATH ?>resources/js/vendor/sweetalert2.all.min.js"></script>
        <script src="<?= HOME_PATH ?>resources/js/components.js"></script>
        <?php
        foreach ($ajax as $script) {
            echo '<script src="' . HOME_PATH . 'resources/js/ajax/app/' . $script .'"></script>';
        }
        ?>

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

            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/webfonts/stylesheet.css">
            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/normalize.css">
            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/main.css">
            <link rel="stylesheet" href="<?= HOME_PATH ?>resources/icons/css/all.min.css">

            <meta name="theme-color" content="#fafafa">
        </head>

        <body class="app">
            <nav class="navbar navbar-light bg-white">
                <img class="ml-3" src="<?= HOME_PATH ?>resources/images/for-light-bg.svg" width="150" height="70" alt="Emergencia.id">
                <div class="navbar-items d-flex align-items-center mr-0 mr-sm-3">
                    <a href="<?= HOME_PATH ?>app/user/profiles" class="color-text text-link mr-lg-5">Mis perfiles</a>
                    <div class="dropdown dropdown-nav-options">
                        <a href="#" class="font-size-regular btn dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= ($_SESSION['user_name'] ? $_SESSION['user_name'] : 'Mi cuenta'). ' ' . $_SESSION['user_lastname']?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item font-size-regular" href="<?= HOME_PATH ?>app/user/settings">Ajustes de cuenta</a>
                            <a class="dropdown-item font-size-regular" href="#" onclick="logout()">Cerrar Sesión</a>
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

                <link rel="stylesheet" href="<?= HOME_PATH ?>resources/webfonts/stylesheet.css">
                <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/bootstrap.min.css">
                <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/normalize.css">
                <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/main.css">
                <link rel="stylesheet" href="<?= HOME_PATH ?>resources/icons/css/all.min.css">

                <meta name="theme-color" content="#fafafa">
            </head>

            <body style="background-color: #fff">
                <div class=""></div>
            <?php
        }

        public static function footerSite(...$ajax)
        {
            ?>
                <!--Here copy the footer of the dashboard site-->
            </body>

            <!-- <script src="https://kit.fontawesome.com/9b3f9e4d8d.js" crossorigin="anonymous"></script> -->
            <script src="<?= HOME_PATH ?>resources/js/vendor/jquery-3.5.1.min.js"></script>
            <script src="<?= HOME_PATH ?>resources/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="<?= HOME_PATH ?>resources/js/vendor/axios.js"></script>
            <script src="<?= HOME_PATH ?>resources/js/vendor/vue.js"></script>
            <script src="<?= HOME_PATH ?>resources/js/plugins.js"></script>
            <script src="<?= HOME_PATH ?>resources/js/main.js"></script>
            <script> var HOST_NAME = "<?= HOST_NAME ?>" </script>
            <script> var HOME_PATH = "<?= HOME_PATH ?>" </script>
            <script src="<?= HOME_PATH ?>resources/js/vendor/sweetalert2.all.min.js"></script>
            <script src="<?= HOME_PATH ?>resources/js/components.js"></script>
            <script src="<?= HOME_PATH ?>resources/js/ajax/app/account.js"></script>
            <?php
            foreach ($ajax as $script) {
                echo '<script src="' . HOME_PATH . 'resources/js/ajax/app/' . $script .'"></script>';
            }
            ?>

            </html>
    <?php

        }
    }

    ?>
