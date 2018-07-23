<?php
declare(strict_types=1);

namespace Selami\Authentication\Controller\Authentication;

use Selami\Interfaces\Application;

class Main extends AuthenticationController implements Application
{
    public function __invoke() : array
    {
        return [
            'status' => 200,
            'meta' => [
                'layout' => 'authentication'
            ],
            'data' => ['t' => self::class]
        ];
    }
}
