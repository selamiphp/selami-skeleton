<?php
declare(strict_types=1);

namespace Selami\Authentication\Controller\Authentication;

use Selami\Interfaces\Application;
use Selami\Dispatcher;

class Check extends AuthenticationController implements Application
{
    public function __invoke() : array
    {

        return [
            'status' => 200,

            'data' => $this->getParams()
        ];
    }
}
