<?php

declare(strict_types=1);

$connection = mysqli_connect('mysql', 'root', 'root');
$connection->query('CREATE DATABASE `test0`');
