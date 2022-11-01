<?php

namespace app\core;

use app\controllers\AddController;
use app\controllers\ViewController;
use app\core\API;

class Router
{
    private string $method;
    private string $data;
    private $api;

    private string $url;
    private array $routes;
    private array $params;
    private array $controllers;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->routes = include_once 'resources/config/routes.php';
        $this->api = new API;

        // $this->params = $this->listParameters($_SERVER['QUERY_STRING']);

        $this->controllers = ['AddController' => (new AddController), 'ViewController' => (new ViewController)];
    }

    public function getMethod()
    {
        return $_REQUEST['method'] ?? '';
    }

    public function getFormData($method)
    {
        if ($method === 'GET') {
            return $_GET;
        }
        if ($method === 'POST') {
            return $_POST;
        }

        $data = [];
        $exploded = explode('&', file_get_contents('php://input'));

        foreach ($exploded as $pair) {
            $item = explode('=', $pair);

            if (count($item) == 2) {
                $data[urldecode($item[0])] = urldecode($item[1]);
            }
        }

        return $data;
    }

    // public function run()
    // {
    //     $uri = parse_url($this->url);
    //     $path = $uri['path'];

    //     if (array_key_exists($path, $this->routes) === false) {
    //         header('Location: /');
    //     }

    //     $action = $this->routes[$path]['action'];

    //     call_user_func([$this->controllers[$this->routes[$path]['controller']], $action], $this->params);

    //     $formData = $this->getFormData($this->method);

    //     $url = (isset($_GET['q'])) ? $_GET['q'] : '';
    //     $url = rtrim($url, '/');
    //     $urls = explode('/', $url);

    //     $router = $urls[0];
    //     $urlData = array_slice($urls, 1);

    //     echo $this->method;
    // }

    // public function listParameters(string $params)
    // {
    //     if ($params) {
    //         $tempArr = explode('&', $params);

    //         foreach ($tempArr as $item) {
    //             $pos = strpos($item, '=');
    //             $list[substr($item, 0, $pos)] = substr($item, $pos + 1, strlen($item));
    //         }
    //     }

    //     return $list ?? [];
    // }

    public function run()
    {
        $uri = parse_url($this->url);
        $path = $uri['path'];

        // var_dump('/^\/' . substr($path, 1, strpos($path, '/', 1) - 1) . '[0-9]+/');
        // echo '<br>';
        // var_dump(substr($path, strpos($path, '/', 1)));
        // echo '<br>';

        // var_dump($path);
        // $r = substr($path, 1, strpos($path, '/', 1) - 1);
        // var_dump($r);
        // die();

        echo 'path - '.$path.'<br>';
        echo 'path2 - '.strpos($path, '/', 1).'<br>';
        echo('substring - '.substr($path, 0, strpos($path, '/', 1)).'<br>');

        if ($path !== '/' || array_key_exists(substr($path, 0, strpos($path, '/', 1)), $this->routes) === false) {
            header('Location: /');
        }

        $formData = $this->getFormData($this->getMethod());

        // var_dump($_GET);
        // $url = rtrim($url, '/');
        // $urls = explode('/', $url);

        // $router = $urls[0];
        $urlData = $this->url; // array_slice($urls, 1);
        // var_dump($_SERVER);

        $this->route($this->getMethod(), $urlData, $this->getFormData($this->getMethod()));
        $action = $this->routes[$path]['action'];

        call_user_func([$this->controllers[$this->routes[$path]['controller']], $action]);
    }

    public function route($method, $urlData, $formData)
    {
        return $this->api->APIcall($method, $urlData, $formData);
    }
}
