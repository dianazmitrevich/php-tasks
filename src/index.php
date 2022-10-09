<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';


require 'models/Database.php';
require 'models/User.php';
require 'controllers/Controller.php';

$config = require 'resources/config/config.php';

$connection = mysqli_connect($config['db_host'], $config['db_user'], $config['db_password'], $config['db_name']);
$db = new Database($connection);

$controller = new Controller($db);
$controller->main();
