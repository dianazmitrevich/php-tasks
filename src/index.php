<?php

declare(strict_types=1);

$connection = mysqli_connect('mysql', 'root', 'root');

$db = $connection->query('SHOW databases;');
echo var_dump($db);