<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ServiceExport;
use App\Http\Controllers\Controller;
use App\Imports\ServiceImport;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Jenssegers\Agent\Agent;

class StudentController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request) {
        try {
            $students = StudentModel::paginate(10);
            foreach ($students as $student) {
                $student->finish_education = StudentModel::finishEducation($student->finish_education);
            }
            return view('admin.student.index', [
                'students' => $students,
                'admin' => $request->user(),
            ]);
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }


    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(int $id, Request $request) {
        try {
            $student = StudentModel::query()->find($id);
            $student->finish_education = StudentModel::finishEducation($student->finish_education);
            return view('admin.student.show', [
                'student' => $student,
                'admin' => $request->user(),
            ]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.index')->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }


    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(int $id, Request $request) {
        try {
            $student = StudentModel::query()->find($id);
            $agent = new Agent();
            $browser = $agent->browser();
            return view('admin.student.edit', [
                'student' => $student,
                'browser' => $browser,
                'admin' => $request->user(),
            ]);
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

    /**
     * @param Request $request
     * @param StudentModel $student
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, StudentModel $student) {
        $request->flash();
        $this->validate($request, StudentModel::rules($student), [], StudentModel::attributesName());
        if ($student->checkStudent($request)) {
            return redirect()->back()->with('error', 'Студент с такими данными уже есть.');
        }
        try {
            $student->fill($request->all());
            $student->finish_education = $student->finishEducationForDB($request->input('finish_education'));
            if ($student->update()) {
                return back()->with('success', 'Изменения сохранены');
            } else {
                return back()->with('error', 'Не удалось обновить данные. Попробуйте еще раз.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз.');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        try {
            if (DB::table('students')->where('id', '=', $id)->delete()) {
                return back()->with('success', 'Запись успешно удалена.');
            } else {
                return back()->with('error', 'Не удалось удалить запись. Попробуйте еще раз');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

    // Добавление одиночной записи

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request) {
        $request->flash();
        $object = new StudentModel();
        $this->validate($request, StudentModel::rules($object), [], StudentModel::attributesName());

        if ($object->checkStudent($request)) {
            return redirect()->back()->with('error', 'Студент с такими данными уже есть.');
        }

        try {
            $date = $object->finishEducationForDB($request->input('finish_education'));
            $object->fill($request->all());
            $object->finish_education = $date;
            $result = $object->save();

            if ($result) {
                return redirect()->back()->with('success', 'Запись успешно добавлена');
            } else {
                return redirect()->back()->with('error', 'Не удалось добавить запись в базу. Попробуйте еще раз');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    // Загрузка таблицей excel

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request) {
        if (!$request->hasFile('students')) {
            return redirect()->back()->with('error', 'Вы не загрузили файл');
        } else {
            try {
                $path = $request->file('students')->store('storage');
                $import = new ServiceImport();
                $import->import($path);
                if ($import->repeat) {
                    $msg = 'Данные успешно загруженны, но при загрузке были повторы с уже существующими записями.';
                } else {
                    $msg = 'Данные успешно загруженны.';
                }
                return redirect()->back()->with('success', $msg);
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
            }

        }

    }

    // Выгрузка таблицы excel

    /**
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export() {
        try {
            return Excel::download(new ServiceExport, 'students.xlsx');
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function find(Request $request) {
        $request->flash();
        if ($request->protocol_find && $request->surname_find) {
            $students = StudentModel::query()->where('protocol', '=', $request->protocol_find)
                ->where('surname', '=', $request->surname_find)->paginate(5);
        } elseif ($request->protocol_find) {
            $students = StudentModel::query()->where('protocol', '=', $request->protocol_find)->paginate(5);;
        } elseif ($request->surname_find) {
            $students = StudentModel::query()->where('surname', '=', $request->surname_find)->paginate(5);;
        }
        else {
            return back()->with('error', 'Нужно ввести номер протокола или фамилию. Можно и то и то.');
        }

        if ($students->isNotEmpty()) {
            foreach ($students as $student) {
                $student->finish_education = StudentModel::finishEducation($student->finish_education);
            }
            return view('admin.student.index', [
                'students' => $students,
            ]);
        } else {
            return back()->with('error', 'Ничего не нашли');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAll() {
        try {
            StudentModel::truncate();
            return back()->with('success', 'Весь реестр удален.');
        }catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }
}
