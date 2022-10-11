<?php

declare(strict_types=1);

require_once './vendor/autoload.php';

use app\controllers\Controller;
use app\core\Router;

$router = new Router;
$router->run();

$controller = new Controller;
$controller->main();
