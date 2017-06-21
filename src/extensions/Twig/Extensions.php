<?php
declare(strict_types=1);

namespace SelamiApp\Extension\Twig;

use Twig\Environment;

class Extensions
{

    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function translator(array $dictionary) : void
    {

        $filter = new \Twig_SimpleFunction(
            'translate',
            function (
                $string
            ) use ($dictionary) {
                if (array_key_exists($string, $dictionary)) {
                    return $dictionary[$string];
                }
                return $string;
            },
            array('is_safe' => array('html'))
        );
        $this->twig->addFunction($filter);
    }
}