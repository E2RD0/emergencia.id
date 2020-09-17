<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= HOME_PATH ?>resources/webfonts/stylesheet.css">
    <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/normalize.css">
    <link rel="stylesheet" href="<?= HOME_PATH ?>resources/css/main.css">
    <link rel="stylesheet" href="<?= HOME_PATH ?>resources/icons/css/all.min.css">
    <style>
    .miclase {
        display: row;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .test {
        display: row;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <h1 style="color: #2F8DEB" class="title-page text-center"><?php 
                        echo $_GET['name']
                    ?></h1>   
            </div>
            <div class="col-12 text-center">
                <small>DMAIDN328120371280DH9A8</small>
            </div>
            <div class="col d-flex justify-content-center">
                <img src="https://chart.googleapis.com/chart?cht=qr&chl=Guillermo%20Salvador%20Cartagena%20Mejia%20te%20amo%20con%20todo%20mi%20coraz%C3%B3n&choe=UTF-8&chs=500"
                        alt="">
            </div>
        </div>
    </div>
</body>

</html>