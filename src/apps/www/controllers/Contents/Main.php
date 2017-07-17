<?php
declare(strict_types=1);

namespace SelamiApp\Controller\Contents;

use Selami\Interfaces\Application;


class Main extends ContentsController implements Application
{
    public function __invoke() : array
    {
        return ['status' => 200, 'data' => ['t' => self::class]];
    }
}