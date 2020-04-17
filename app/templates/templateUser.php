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

    public static function headerSite()
    {
    ?>
        <!--Here copy the header of the dashboard site-->
    <?php
    }

    public static function footerSite()
    {
    ?>
        <!--Here copy the footer of the dashboard site-->
<?php
    }
}

?>