<?php
declare(strict_types=1);


namespace SelamiApp\Contents;

use Psr\Container\ContainerInterface;
use Selami\Interfaces\Application;

use Psr\Http\Message\ServerRequestInterface;

class Category  extends ContentsController implements Application
{
    public function respond() : array
    {
        return ['status' => 200, 'data' => ['t' => 'Category:'. $this->args['category']]];
    }

}