<?php
declare(strict_types=1);


namespace Selami\Helper;

use Psr\Http\Message\ServerRequestInterface;

abstract class ApplicationHelper
{
    /**
     * @var array
     */
    protected $args;

    /**
     * @var ServerRequestInterface
     */
    protected $request;

    protected function getParam(string $key, $default = null)
    {
        $postParams = $this->request->getParsedBody();
        $getParams = $this->request->getQueryParams();
        $return = $default;
        if (is_array($postParams) && array_key_exists($key, $postParams)) {
            $return = $postParams[$key];
        } elseif (is_object($postParams) && property_exists($postParams, $key)) {
            $return = $postParams->$key;
        } elseif (isset($getParams[$key])) {
            $return = $getParams[$key];
        }
        return $return;
    }

    protected function getParams() : array
    {
        $params = $this->request->getQueryParams();
        $postParams = $this->request->getParsedBody();
        if ($postParams) {
            $params = array_merge($params, (array)$postParams);
        }
        return $params;
    }
}
