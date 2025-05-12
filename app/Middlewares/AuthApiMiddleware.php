<?php
namespace Middlewares;

use Model\User;
use Src\Request;
use Src\Auth\Auth;
use Src\View;

class AuthApiMiddleware
{
    public function handle(Request $request): void
    {
        $token = $this->getBearerToken($request);

        if (!$token || !$user = User::where('token', $token)->first()) {
            (new View())->toJSON(['error' => 'Unauthorized'], 401);
        }

        Auth::login($user);
    }

    protected function getBearerToken(Request $request): ?string
    {
        $header = $request->headers['Authorization'] ?? '';
        return preg_match('/Bearer\s+(\S+)/', $header, $matches) ? $matches[1] : null;
    }
}