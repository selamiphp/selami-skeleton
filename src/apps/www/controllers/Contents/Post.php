<?php
declare(strict_types=1);

namespace SelamiApp\Contents;

use Selami\Interfaces\Application;

class Post extends ContentsController implements Application
{

    public function respond() : array
    {
        $count = $this->session->get('count', 0);
        $count++;
        $this->session->set('count', $count);
        return [
            'status' => 200,
            'data' => [
                't' => 'Post:'.$this->args['year'].'-'.$this->args['month'].'-'.$this->args['slug'],
                'c' => $count
            ]
        ];
    }




}