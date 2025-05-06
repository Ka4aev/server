<?php

namespace Controller;

use Model\Faculty;
use Model\User;
use Src\Request;
use Src\View;

class EmployeeController
{
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
    public function employeeList(Request $request): string
    {
        $employees = User::all();
        return new View('site.employees', ['employees' => $employees]);
    }
}