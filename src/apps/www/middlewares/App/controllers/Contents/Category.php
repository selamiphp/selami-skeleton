<?php
declare(strict_types=1);


namespace Selami\App\Controller\Contents;

use Psr\Container\ContainerInterface;
use Selami\Interfaces\Application;

use Psr\Http\Message\ServerRequestInterface;

class Category extends ContentsController implements Application
{
    public function __invoke() : array
    {
        return ['status' => 200, 'data' => ['t' => 'Category:'. $this->args['category']]];
    }
}
