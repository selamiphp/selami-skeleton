<?php
declare(strict_types=1);


namespace Selami\App\Controller;

use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;
use Selami\Helper;

abstract class Application extends Helper\ApplicationHelper
{
    /**
     * @var SymfonySession
     */
    protected $session;
}
