<?php

namespace Controller;

use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\View;
use function Validate\validate;

class ApiController
{
    public function users(): void
    {
        $posts = User::all()->toArray();
        (new View())->toJSON($posts);
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