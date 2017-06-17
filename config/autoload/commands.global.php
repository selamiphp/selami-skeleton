<?php
declare(strict_types=1);

return [
    'commands' => [
        SelamiApp\Command\Info::class,
        SelamiApp\Command\Cache\ClearAll::class,
        SelamiApp\Command\Cache\ClearConfig::class,
        SelamiApp\Command\Cache\ClearRouteDispatcherData::class
    ]
];