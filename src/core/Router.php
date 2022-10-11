<?php

namespace app\core;

class Router
{
    private string $url;
    private array $routes;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->routes = include_once 'resources/config/routes.php';
    }

    public function run()
    {
        $uri = parse_url($this->url);
        $path = $uri['path'];
        var_dump($path);

        if (array_key_exists($path, $this->routes) === false) {
            return;
        }

        $callback = $this->routes[$path];
        $callback();
    }
}
