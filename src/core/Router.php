<?php

namespace app\core;

use app\controllers\AddController;
use app\controllers\ViewController;

class Router
{
    private string $url;
    private array $routes;
    private array $params;
    private array $controllers;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->routes = include_once 'resources/config/routes.php';
        $this->params = $this->listParameters($_SERVER['QUERY_STRING']);
        $this->controllers = ['AddController' => (new AddController), 'ViewController' => (new ViewController)];
    }

    public function run()
    {
        $uri = parse_url($this->url);
        $path = $uri['path'];

        if (array_key_exists($path, $this->routes) === false) {
            echo '404';

            exit;
        }

        $action = $this->routes[$path]['action'];

        call_user_func([$this->controllers[$this->routes[$path]['controller']], $action], $this->params);
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
