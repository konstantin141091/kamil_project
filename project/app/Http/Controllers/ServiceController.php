<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use App\Http\Requests\UserServiceRequest;

class ServiceController extends Controller
{
    public function index() {
        return view('service.index');
    }

    public function find(UserServiceRequest $request) {
        $request->flash();
        $request->validated();

        $students = StudentModel::query()->where('name', '=', $request->name)
                                        ->where('surname', '=', $request->surname)
                                        ->where('patronymic', '=', $request->patronymic)->get();

        if ($students->isNotEmpty()) {
            return view('service.show', [
                'students' => $students
            ]);
        }

        return back()->with('error', 'Не удалось ничего найти');
    }
}
