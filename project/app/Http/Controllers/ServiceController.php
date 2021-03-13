<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use App\Http\Requests\UserServiceRequest;
use Jenssegers\Agent\Agent;

class ServiceController extends Controller
{
    public function index() {
        $agent = new Agent();
        $browser = $agent->browser();

        return view('service.index', [
            'browser' => $browser,
        ]);
    }

    public function find(UserServiceRequest $request) {
        $request->flash();
        $request->validated();
        $request->finish_education = StudentModel::finishEducationForDB($request->finish_education);
        try {
            $students = StudentModel::query()->where('name', '=', $request->name)
                ->where('surname', '=', $request->surname)
                ->where('patronymic', '=', $request->patronymic)
                ->where('protocol', '=', $request->protocol)
                ->where('finish_education', '=', $request->finish_education)->get();

            if ($students->isNotEmpty()) {
                foreach ($students as $student) {
                    $student->finish_education = StudentModel::finishEducation($student->finish_education);
                }
                return back()->with('students', $students);
            }
            return back()->with('error', 'Не удалось ничего найти.');
        } catch (\Exception $exception) {
            return back()->with('error', 'Ошибка запроса. Попробуйте еще раз.');
        }
    }

}
