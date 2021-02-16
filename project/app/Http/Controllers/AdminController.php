<?php

namespace App\Http\Controllers;

use App\Imports\ServiceImport;
use App\Exports\ServiceExport;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index() {

        return view('admin.index');
    }

    // Добавление одиночной записи
    public function create(Request $request) {
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
            return redirect()->back()->with('error', 'Не удалось добавить запись в базу. Попробуйте еще раз');
        }
    }

    // Загрузка таблицей excel
    public function import(Request $request) {
        if (!$request->hasFile('excel')) {
            return redirect()->back()->with('error', 'Вы не загрузили файл');
        } else {
            try {
                $path = $request->file('excel')->store('storage');
                Excel::import(new ServiceImport, $path);
                return redirect()->back()->with('success', 'Данные успешно загруженны');
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', 'Не удалось загрузить базу. Попробуйте еще раз');
            }

        }

    }

    // Выгрузка таблицы excel
    public function export() {
        return Excel::download(new ServiceExport, 'students.xlsx');
    }
}
