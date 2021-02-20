<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ServiceExport;
use App\Http\Controllers\Controller;
use App\Imports\ServiceImport;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller
{
    public function index() {
        try {
            $students = StudentModel::paginate(10);
            return view('admin.student.index', [
                'students' => $students
            ]);
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    public function show($id) {
        try {
            $student = StudentModel::query()->find($id);
            return view('admin.student.show', [
                'student' => $student
            ]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.index')->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

    public function edit($id) {
        try {
            $student = StudentModel::query()->find($id);
            return view('admin.student.edit', [
                'student' => $student,
            ]);
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

    public function update(Request $request, StudentModel $studentModel) {
        $request->flash();
        $this->validate($request, StudentModel::rules($studentModel), [], StudentModel::attributesName());
        try {
            $student = StudentModel::query()->find($request->protocol);
            $student->fill($request->all());
            if ($student->save()) {
                return back()->with('success', 'Изменения сохранены');
            } else {
                return back()->with('error', 'Не удалось обновить данные. Попробуйте еще раз.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз.');
        }

    }

    public function delete(Request $request) {
        try {
            if (DB::table('students')->where('protocol', '=', $request->protocol)->delete()) {
                return redirect()->route('admin.index')->with('success', 'Запись успешно удалена.');
            } else {
                return back()->with('error', 'Не удалось удалить запись. Попробуйте еще раз');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

    // Добавление одиночной записи
    public function create(Request $request) {
        $request->flash();
        $object = new StudentModel();
        $this->validate($request, StudentModel::rules($object));
        try {
            $result = $object->fill($request->all())->save();
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
    public function import(Request $request) {
        if (!$request->hasFile('students')) {
            return redirect()->back()->with('error', 'Вы не загрузили файл');
        } else {
            try {
                $path = $request->file('students')->store('storage');
                Excel::import(new ServiceImport, $path);
                return redirect()->back()->with('success', 'Данные успешно загруженны');
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
            }

        }

    }

    // Выгрузка таблицы excel
    public function export() {
        try {
            return Excel::download(new ServiceExport, 'students.xlsx');
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

    public function find(Request $request) {
        $request->flash();
        if ($request->protocol_find) {
            $student = StudentModel::query()->find($request->protocol_find);
            if ($student) {
                return view('admin.student.show', [
                    'student' => $student,
                ]);
            } else {
                return back()->with('error', 'Ничего не нашли');
            }
        }else {
            return back()->with('error', 'Поле Протокол не заполнено');
        }
    }
}
