<?php
declare(strict_types=1);


namespace Selami\Auth\Controller\Auth;

use Selami\Auth\Controller\Application;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class AuthController extends Application
{

    public function __construct(ServerRequestInterface $request, Session $session, ?array $args)
    {
        $this->session = $session;
        $this->request = $request;
        $this->args = $args;
    }
}
