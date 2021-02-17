<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use App\Http\Requests\UserServiceRequest;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        return view('service.index');
    }

    public function findByName(UserServiceRequest $request) {
        $request->flash();
        $request->validated();

        try {
            $students = StudentModel::query()->where('name', '=', $request->name)
                ->where('surname', '=', $request->surname)
                ->where('patronymic', '=', $request->patronymic)->get();

            if ($students->isNotEmpty()) {
                return back()->with('students', $students);
            }

            return back()->with('error', 'Не удалось ничего найти.');
        } catch (\Exception $exception) {
            return back()->with('error', 'Ошибка запроса. Попробуйте еще раз.');
        }
    }

    public function findByProtocol(Request $request) {
        $request->flash();
        $request->validate([
            'protocol' => 'required|max:25',
        ], [], ['protocol' => 'Протокол']);

        try {
            $students = StudentModel::query()->where('protocol', '=', $request->protocol)->get();

            if ($students->isNotEmpty()) {
                return back()->with('students', $students);
            }

            return back()->with('error', 'Не удалось ничего найти.');
        } catch (\Exception $exception) {
            return back()->with('error', 'Ошибка запроса. Попробуйте еще раз.');
        }
    }
}
