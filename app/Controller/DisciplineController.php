<?php

namespace Controller;

use Model\Discipline;
use Src\Request;
use Src\View;

class DisciplineController
{
    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST' && Discipline::create($request->all())) {
            app()->route->redirect('/disciplines');
        }
        return new View('site.add-discipline');
    }
    public function disciplineList(Request $request): string
    {
        $disciplines = Discipline::all();
        return new View('site.disciplines', ['disciplines' => $disciplines]);
    }
}