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

    public function addFaculty(Request $request): string
    {
        if ($request->method === 'POST' && Faculty::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.add-faculty');
    }

    public function profile(Request $request): string
    {
        return new View('site.profile', ['user' => app()->auth->user()]);
    }
}