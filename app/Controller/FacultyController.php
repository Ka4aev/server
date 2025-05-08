<?php

namespace Controller;

use Model\Faculty;
use Src\Request;
use Src\View;

class FacultyController
{
    public function addFaculty(Request $request): void
    {
        if ($request->method === 'POST') {
            Faculty::create(['name' => $request->name]);
            app()->route->redirect('/');
        }

        (new View)->render('site.add-faculty');
    }
}