<?php

namespace Framework\Router;

class Router
{
    public function __construct(private string $url, private bool $isApi = false)
    {
        $this->url = trim($url, "/");
    }

    public function match(string $url)
    {
        if (preg_match("#^{$url}$#", $this->url, $matches)) {
            return $this->matches = $matches;
        }
    }

    /**
     * Execute la méthode du controller appelé
     *
     * @param string $controller
     * @param string $method
     * @return void
     */
    public function execute(string $controller, string $method)
    {
        return isset($this->matches[1]) ? (new $controller())->$method($this->matches[1]) : (new $controller())->$method();
    }
}
