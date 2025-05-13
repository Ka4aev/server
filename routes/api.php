<?php

use Src\Route;

Route::add('GET', '/users', [Controller\ApiController::class, 'users']);
Route::add('GET', '/disciplines', [Controller\ApiController::class, 'disciplines']);
Route::add('GET', '/faculties', [Controller\ApiController::class, 'faculties']);
Route::add('POST', '/login', [Controller\ApiController::class, 'login']);
Route::add('POST', '/create', [Controller\ApiController::class, 'addEmployee'])->middleware('token');
Route::add('POST', '/logout', [Controller\ApiController::class, 'logout'])->middleware('token');