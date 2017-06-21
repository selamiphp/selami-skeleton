<?php
declare(strict_types=1);

namespace SelamiApp\Controller\Contents;

use Selami\Interfaces\Application;


class NotFound extends ContentsController implements Application
{
    public function respond() : array
    {
        return ['status' => 404, 'data' => ['t' => 'Main']];
    }
}