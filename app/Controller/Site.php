<?php
namespace Controller;

use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Model\Post;
use Model\User;
use Model\Discipline;
use Model\Faculty;

class Site
{
    public function index(Request $request): string
    {
        // Если есть id в запросе - ищем по id, иначе получаем все записи
        $posts = isset($request->id)
            ? Post::where('id', $request->id)->get()
            : Post::all();

        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function main(): string
    {
        return new View('site.home', ['message' => 'Учебно-методическое управление']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/');
    }
    public function handleAction(Request $request): void
    {
        app()->route->redirect(match($request->action) {
            'add-employee' => '/add-employee',
            'add-discipline' => '/add-discipline',
            'list_employees' => '/employees',
            'list_disciplines' => '/disciplines',
            default => '/'
        });
    }
    public function addEmployee(Request $request): string
    {
        if ($request->method === 'POST') {

            if (User::where('login', $request->login)->exists()) {
                return new View('site.add-employee', [
                    'faculties' => Faculty::all(),
                    'message' => 'Этот логин уже занят',
                ]);
            }

            if (User::create([...$request->all(), 'role_id' => 2])) {
                app()->route->redirect('/');
            }
        }

        return new View('site.add-employee', [
            'faculties' => Faculty::all()
        ]);
    }
    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST' && Discipline::create($request->all())) {
            app()->route->redirect('/disciplines');
        }
        return new View('site.add-discipline');
    }

    public function employeeList(Request $request): string
    {
        $employees = User::all();
        return new View('site.employees', ['employees' => $employees]);
    }

    public function disciplineList(Request $request): string
    {
        $disciplines = Discipline::all(); // Получаем все дисциплины
        return new View('site.disciplines', ['disciplines' => $disciplines]);
    }

    public function profile(Request $request): string
    {
        return new View('site.profile', ['user' => app()->auth->user()]);
    }
}