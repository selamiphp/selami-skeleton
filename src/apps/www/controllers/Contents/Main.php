<?php
declare(strict_types=1);

namespace SelamiApp\Contents;

use Selami\Interfaces\Application;


class Main extends ContentsController implements Application
{
    public function respond() : array
    {
        return ['status' => 200, 'data' => ['t' => 'Main']];
    }
}