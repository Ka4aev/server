<?php

namespace Controller;

use Model\Faculty;
use Model\User;
use Src\Request;
use Src\View;
use function  Collect\collection;

class UserController
{
    public function addEmployee(Request $request): string
    {
        if ($request->method === 'POST') {
            $validation = collection($request->all())->validate([
                'name' => ['required'],
                'surname' => ['required'],
                'birth_date' => ['required', 'date'],
                'address' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required', 'password']
            ]);

            if ($validation->fails()) {
                return new View('site.add-employee', [
                    'faculties' => Faculty::all(),
                    'errors' => $validation->errors(),
                    'request' => $request->all()
                ]);
            }

            if (User::create([...$request->all(), 'role_id' => 2])) {
                app()->route->redirect('/employees');
            }
        }

        return new View('site.add-employee', [
            'faculties' => Faculty::all(),
            'errors' => [],
            'request' => []
        ]);
    }

    public function employeeList(Request $request): string
    {
        $selectedFaculties = $request->get('faculty_ids', []);

        // Базовый запрос - исключаем админов
        $query = User::where('role_id', '!=', 1)->with('faculty');

        if (!empty($selectedFaculties)) {
            $query->whereIn('faculty_id', $selectedFaculties);
        }

        return new View('site.employees', [
            'employees' => $query->get(),
            'faculties' => Faculty::all(),
            'selectedFaculties' => $selectedFaculties
        ]);
    }

    public function profile(Request $request): string
    {
        $user = app()->auth->user();
        $user->load('disciplines');

        $message = null;

        if ($request->method === 'POST' && isset($request->discipline_id) && isset($request->passed_time)) {
            $disciplineId = $request->discipline_id;
            $passedTime = $request->passed_time;

            $discipline = $user->disciplines->find($disciplineId);

            if ($discipline) {
                if ($passedTime <= $discipline->all_time) {
                    $user->disciplines()->updateExistingPivot(
                        $disciplineId,
                        ['passed_time' => $passedTime]
                    );
                    $message = 'Часы успешно сохранены!';
                }
            } else {
                $message = 'Ошибка: дисциплина не найдена';
            }

            $user->load('disciplines');
        }

        return new View('site.profile', [
            'user' => $user,
            'message' => $message
        ]);
    }
}