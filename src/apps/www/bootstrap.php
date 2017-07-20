<?php
declare(strict_types=1);
$_appLang = 'en';
if (strpos($_SERVER['REQUEST_URI'], '/tr') === 0) {
    $_appLang = 'tr';
}
define('RUNTIME_LANG', $_appLang);
define('APP_DIR', __DIR__);
require dirname(__DIR__) . '/bootstrap.php';
