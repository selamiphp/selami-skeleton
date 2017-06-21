<?php
declare(strict_types=1);

namespace SelamiApp;

class RuntimeApp
{
    private $language;
    private $type;

    public function __construct(string $type, string $language = 'en')
    {
        $this->language = $language;
        $this->type = $type;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function getLanguage() : string
    {
        return $this->language;
    }
}