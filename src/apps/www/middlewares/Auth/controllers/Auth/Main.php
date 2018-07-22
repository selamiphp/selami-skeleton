<?php
declare(strict_types=1);

namespace Selami\Auth\Controller\Auth;

use Selami\Interfaces\Application;

class Main extends AuthController implements Application
{
    public function __invoke() : array
    {
        return [
            'status' => 200,
            'meta' => [
                'layout' => 'auth'
            ],
            'data' => ['t' => self::class]
        ];
    }
}
