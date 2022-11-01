<?php

return [
    '/' => [
        'method' => 'GET',
        'controller' => 'AddController',
        'action' => 'main',
    ],
    // '/add' => [
    //     'controller' => 'AddController',
    //     'action' => 'add',
    // ],
    // '/view' => [
    //     'controller' => 'ViewController',
    //     'action' => 'view',
    // ],
    // '/edit' => [
    //     'controller' => 'ViewController',
    //     'action' => 'edit',
    // ],
    '/users' => [
        'method' => 'GET',
        'controller' => 'AddController',
        'action' => 'add',
    ],
    '/users' => [
        'method' => 'POST',
        'controller' => 'ViewController',
        'action' => 'view',
    ],
    '/users' => [
        'method' => 'PUT',
        'controller' => 'ViewController',
        'action' => 'view',
    ],
    '/users' => [
        'method' => 'DELETE',
        'controller' => 'ViewController',
        'action' => 'view',
    ],
];
