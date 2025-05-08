<?php

namespace Controller;

use Model\Faculty;
use Src\Request;
use Src\View;

class FacultyController
{
    public function addFaculty(Request $request): string
    {
        if ($request->method === 'POST' && Faculty::create($request->all())) {
            app()->route->redirect('/');
        }
        return new View('site.add-faculty');
    }
}
