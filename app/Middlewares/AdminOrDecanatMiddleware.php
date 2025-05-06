<?php
namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminOrDecanatMiddleware
{
    public function handle(Request $request)
    {
        $user = Auth::user();

        if (!$user || ($user->role_id != 1 && $user->position != 'decanat')) {
            app()->route->redirect('/');
        }
    }
}