<?php
namespace Controller;

use Src\View;
use Src\Request;
use Model\Faculty;

class SiteController
{
    public function main(): string
    {
        return new View('site.home', ['message' => 'Учебно-методическое управление']);
    }
    public function handleAction(Request $request): void
    {
        app()->route->redirect(match($request->action) {
            'add-employee' => '/add-employee',
            'add-discipline' => '/add-discipline',
            'add-faculty' => '/add-faculty',
            'list_employees' => '/employees',
            'list_disciplines' => '/disciplines',
            default => '/'
        });
    }
}