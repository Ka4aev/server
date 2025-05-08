<?php
use Src\Route;

Route::add('GET', '/', [Controller\SiteController::class, 'main'])->middleware('auth');
Route::add('GET', '/handle-action', [Controller\SiteController::class, 'handleAction']);

Route::add(['GET', 'POST'], '/login', [Controller\AuthContoller::class, 'login']);
Route::add('GET', '/logout', [Controller\AuthContoller::class, 'logout']);

Route::add(['GET', 'POST'], '/add-employee', [Controller\UserController::class, 'addEmployee'])->middleware('auth', 'adminOrDecanat');
Route::add('GET', '/employees', [Controller\UserController::class, 'employeeList'])->middleware('auth', 'adminOrDecanat');
Route::add('GET', '/profile', [Controller\UserController::class, 'profile'])->middleware('teacher');

Route::add(['GET', 'POST'], '/add-discipline', [Controller\DisciplineController::class, 'addDiscipline'])->middleware('auth', 'adminOrDecanat');
Route::add('GET', '/disciplines', [Controller\DisciplineController::class, 'disciplineList'])->middleware('auth');

Route::add(['GET', 'POST'], '/add-faculty', [Controller\FacultyController::class, 'addFaculty'])->middleware('auth', 'adminOrDecanat');
