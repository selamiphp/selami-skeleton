<?php
declare(strict_types=1);

use Zend\Stdlib\ArrayUtils;
use Zend\Stdlib\Glob;

$siteBasedConfig = '';
if (defined('RUNTIME_PLATFORM')) {
    $siteBasedConfig = RUNTIME_PLATFORM.'_';
}
if (defined('RUNTIME_LANG')) {
    $siteBasedConfig .= RUNTIME_LANG.'_';
}
$cachedConfigFile = dirname(__DIR__) . '/cache/'.$siteBasedConfig.'app_config.php';

$config = [];

if (is_file($cachedConfigFile)) {
    $config = json_decode(file_get_contents($cachedConfigFile), true);
} else {
    foreach (Glob::glob(__DIR__ . '/autoload/{{,*.}global,{,*.}local}.php', Glob::GLOB_BRACE) as $file) {
        $config = ArrayUtils::merge($config, include $file);
    }
    if (defined('RUNTIME_PLATFORM')) {
        $config = ArrayUtils::merge($config, include __DIR__ . '/sites/'.RUNTIME_PLATFORM.'.config.php');
    }

    if (defined('RUNTIME_LANG')) {
        $config = ArrayUtils::merge($config, include __DIR__ . '/lang/' . RUNTIME_LANG . '.php');
    }
    if (isset($config['config_cache_enabled']) && $config['config_cache_enabled'] === true) {
        file_put_contents($cachedConfigFile, json_encode($config));
    }
}
return $config;
