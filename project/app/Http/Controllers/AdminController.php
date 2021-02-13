<?php

namespace App\Http\Controllers;

use App\Imports\ServiceImport;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index() {

        return view('admin.index');
    }

    public function create(Request $request) {
        $object = new ServiceModel();
        $this->validate($request, ServiceModel::rules($object));

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

    public function import(Request $request) {
        if (!$request->hasFile('excel')) {
            return redirect()->back()->with('error', 'Вы не загрузили файл');
        } else {
            $path = $request->file('excel')->store('storage');
            Excel::import(new ServiceImport, $path);
            return redirect()->back()->with('success', 'Данные успешно загруженны');
        }

    }
}
