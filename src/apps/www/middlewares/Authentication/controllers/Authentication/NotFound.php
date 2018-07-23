<?php
declare(strict_types=1);

namespace Selami\Authentication\Controller\Authentication;

use Selami\Interfaces\Application;

class NotFound extends AuthenticationController implements Application
{
    public function __invoke() : array
    {
        var_dump('df');exit;
        return [
            'status' => 404, 'data' => []
        ];
    }
}
