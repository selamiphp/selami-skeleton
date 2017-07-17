<?php
declare(strict_types=1);
$_appLang = 'tr';
if (strpos($_SERVER['REQUEST_URI'], '/en') === 0) {
    $_appLang = 'en';
}
define('RUNTIME_PLATFORM', 'mobile');
define('RUNTIME_LANG', $_appLang);
define('APP_DIR', __DIR__);
require dirname(__DIR__) . '/bootstrap.php';
