<?php
namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class TeacherMiddleware
{
    public function handle(Request $request)
    {
        $user = Auth::user();

        if (!$user || ($user->position == 'decanat' || $user->role_id == 1)) {
            app()->route->redirect('/');
        }
    }
}