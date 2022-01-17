<?php

namespace Framework\Router;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD|Attribute::TARGET_CLASS|Attribute::IS_REPEATABLE)]
class Route
{
    public function __construct(private string $path)
    {
    }

    public function getPath()
    {
        return $this->path;
    }
}
