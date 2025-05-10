<?php

namespace Controller;

use Model\Discipline;
use Model\Faculty;
use Model\User;
use Src\Request;
use Src\View;

class DisciplineController
{
    public function addDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $data = $request->all();

            $discipline = Discipline::create([
                'name' => $data['name'],
                'all_time' => $data['all_time'],
                'faculty_id' => $data['faculty_id']
            ]);

            if (!empty($data['employees'])) {
                $discipline->users()->attach($data['employees']);
            }

            app()->route->redirect('/disciplines');

        }

        return new View('site.add-discipline', [
            'faculties' => Faculty::all(),
            'employees' => User::where('role_id', '!=', 1)->get()
        ]);
    }

    public function disciplineList(Request $request): string
    {
        $query = Discipline::with(['faculty', 'users']);

        // Фильтрация по кафедре
        $facultyId = $request->get('faculty_id', '');
        if ($facultyId !== '') {
            $query->where('faculty_id', $facultyId);
        }

        // Фильтрация по сотруднику
        $employeeId = $request->get('employee_id', '');
        if ($employeeId !== '') {
            $query->whereHas('users', function ($q) use ($employeeId) {
                $q->where('users.id', $employeeId);
            });
        }

        $search = $request->get('search', '');
        if ($search !== '') {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $disciplines = $query->get();

        return new View('site.disciplines', [
            'disciplines' => $disciplines,
            'faculties' => Faculty::all(),
            'employees' => User::where('role_id', '!=', 1)->get(),
            'filters' => [
                'faculty_id' => $facultyId ?? '',
                'employee_id' => $employeeId ?? '',
                'search' => $search
            ]
        ]);
    }
}