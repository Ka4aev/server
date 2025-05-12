<?php
return [
//Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
//Клас пользователя
    'identity' => \Model\User::class,
//Классы для middleware
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'adminOrDecanat' => \Middlewares\AdminOrDecanatMiddleware::class,
        'teacher' => \Middlewares\TeacherMiddleware::class,
    ],
    'routeAppMiddleware' => [
        'json' => \Middlewares\JSONMiddleware::class,
        'auth-api' => \Middlewares\AuthApiMiddleware::class
    ],
    'providers' => [
        'kernel' => \Providers\KernelProvider::class,
        'route' => \Providers\RouteProvider::class,
        'db' => \Providers\DBProvider::class,
        'auth' => \Providers\AuthProvider::class,
    ],
];