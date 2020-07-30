<?php

//Load libreries and dependencies
require __DIR__ . '/libs/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_PORT', getenv('DB_PORT'));
define('DB_NAME', getenv('DB_NAME'));
define('HOME_PATH', getenv('HOME_PATH'));
define('HOST_NAME', getenv('HOST_NAME'));

Valitron\Validator::langDir(__DIR__.'/libs/vendor/vlucas/valitron/lang');
Valitron\Validator::lang('es');
