<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ServiceExport;
use App\Http\Controllers\Controller;
use App\Imports\ServiceImport;
use Illuminate\Http\Request;
use App\Models\StudentModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index() {
        try {
            $students = StudentModel::paginate(10);
            foreach ($students as $student) {
                $student->finish_education = StudentModel::finishEducation($student->finish_education);
            }
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
            $student->finish_education = StudentModel::finishEducation($student->finish_education);
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

    public function update($id, Request $request, StudentModel $studentModel) {
        $request->flash();
        $this->validate($request, StudentModel::rules($studentModel), [], StudentModel::attributesName());
        if (StudentModel::checkStudent($request, $studentModel)) {
            return redirect()->back()->with('error', 'Студент с такими данными уже есть.');
        }
        try {
            $student = $studentModel::query()->find($id);
            $student->fill($request->all());
            if ($student->update()) {
                return back()->with('success', 'Изменения сохранены');
            } else {
                return back()->with('error', 'Не удалось обновить данные. Попробуйте еще раз.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз.');
        }
    }

    public function delete($id) {
        try {
            if (DB::table('students')->where('id', '=', $id)->delete()) {
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
        $this->validate($request, StudentModel::rules($object), [], StudentModel::attributesName());

        if (StudentModel::checkStudent($request, $object)) {
            return redirect()->back()->with('error', 'Студент с такими данными уже есть.');
        }

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
    public function export() {
        try {
            return Excel::download(new ServiceExport, 'students.xlsx');
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }

    }

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

    public function deleteAll() {
        try {
            StudentModel::truncate();
            return back()->with('success', 'Весь реестр удален.');
        }catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }
}
