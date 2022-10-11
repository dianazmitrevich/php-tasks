<?php

namespace app\core;

use app\controllers\Controller;

class Router
{
    private string $url;
    private array $routes;
    private array $params;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->routes = include_once 'resources/config/routes.php';
        $this->params = $this->listParameters($_SERVER['QUERY_STRING']);
    }

    public function run()
    {
        $uri = parse_url($this->url);
        $path = $uri['path'];

        if (array_key_exists($path, $this->routes) === false) {
            echo '404';

            exit;
        }

        $controller = new Controller;
        $action = $this->routes[$path]['action'];

        call_user_func([$controller, $action], $this->params);
    }

    public function listParameters(string $params)
    {
        if ($params) {
            $tempArr = explode('&', $params);

            foreach ($tempArr as $item) {
                $pos = strpos($item, '=');
                $list[substr($item, 0, $pos)] = substr($item, $pos + 1, strlen($item));
            }
        }

        return $list ?? [];
    }
}
