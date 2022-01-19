<?php

namespace Framework\Router;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD|Attribute::TARGET_CLASS|Attribute::IS_REPEATABLE)]
class Route
{
    public function __construct(private string $path, private string $method = "GET")
    {
        $this->path = preg_replace('#{([\w]+)}#', '([^/]+)', trim($path, '/'));
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
