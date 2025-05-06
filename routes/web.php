<?php
use Src\Route;

Route::add('GET', '/', [Controller\Site::class, 'main'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

Route::add('GET', '/handle-action', [Controller\Site::class, 'handleAction']);

Route::add(['GET', 'POST'], '/add-employee', [Controller\Site::class, 'addEmployee'])->middleware('auth', 'adminOrDecanat');
Route::add('GET', '/employees', [Controller\Site::class, 'employeeList'])->middleware('auth', 'adminOrDecanat');

Route::add(['GET', 'POST'], '/add-discipline', [Controller\Site::class, 'addDiscipline'])->middleware('auth', 'adminOrDecanat');
Route::add('GET', '/disciplines', [Controller\Site::class, 'disciplineList'])->middleware('auth');

Route::add('GET', '/profile', [Controller\Site::class, 'profile'])->middleware('teacher');