<?php

namespace Controller;

use Model\Discipline;
use Model\Faculty;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;
use function Validate\validate;

class ApiController
{
    public function users(): void
    {
        (new View())->toJSON(User::all()->toArray());
    }

    public function disciplines(): void
    {
        (new View())->toJSON(Discipline::all()->toArray());
    }

    public function faculties(): void
    {
        (new View())->toJSON(Faculty::all()->toArray());
    }

    public function logout(Request $request): void
    {
        $authHeader = $request->headers['Authorization'] ?? '';

        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];

            // Находим пользователя по токену
            $user = User::where('token', $token)->first();

            if ($user) {
                $user->update(['token' => null]);

                Auth::logout();

                (new View())->toJSON([
                    'status' => 'success',
                    'message' => 'Успешный выход'
                ]);
                return;
            }
        }

        http_response_code(401);
        (new View())->toJSON([
            'status' => 'error',
            'message' => 'Не авторизован'
        ]);
    }

    public function login(Request $request): void
    {
        if (Auth::attempt($request->all())) {
            $token = bin2hex(random_bytes(32));
            Auth::user()->update(['token' => $token]);
            (new View())->toJSON(['token' => $token]);
        } else {
            http_response_code(401);
            (new View())->toJSON(['error' => 'Неверные данные']);
        }
    }

    public function addEmployee(Request $request): void
    {
        $validation = validate($request->all(), [
            'name' => ['required'],
            'surname' => ['required'],
            'birth_date' => ['required', 'date'],
            'address' => ['required'],
            'login' => ['required', 'unique:users,login'],
            'password' => ['required', 'password']
        ]);

        if ($validation->fails()) {
            (new View())->toJSON([
                'status' => 'error',
                'errors' => $validation->errors()
            ]);
        }

        $user = User::create([...$request->all(), 'role_id' => 2]);

        if ($user) {
            (new View())->toJSON([
                'message' => 'Пользователь успешно создан',
                'user' => $user
            ]);
        }
    }
}