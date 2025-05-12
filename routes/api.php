<?php

use Src\Route;

Route::add('GET', '/users', [Controller\ApiController::class, 'users']);
Route::add('POST', '/login', [Controller\ApiController::class, 'login']);
Route::add('POST', '/create', [Controller\ApiController::class, 'addEmployee'])->middleware('auth-api');