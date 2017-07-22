<?php
declare(strict_types=1);

return [
    'commands' => [
        Selami\Command\Info::class,
        Selami\Command\Server\ServerRun::class,
        // Cache Commands
        Selami\Command\Cache\ClearAll::class,
        Selami\Command\Cache\ClearConfig::class,
        Selami\Command\Cache\ClearRouteDispatcherData::class,
        Selami\Command\Cache\ClearViewData::class
    ]
];