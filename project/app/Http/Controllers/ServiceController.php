<?php

namespace App\Http\Controllers;

use App\Models\ServiceModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserServiceRequest;

class ServiceController extends Controller
{
    public function index() {
        return view('service.index');
    }

    public function find(UserServiceRequest $request) {
        $request->flash();
        $request->validated();

        $service = ServiceModel::query()->where('name', '=', $request->name)
                                        ->where('surname', '=', $request->surname)
                                        ->where('patronymic', '=', $request->patronymic)->get();

        if ($service->isNotEmpty()) {
            return view('service.show', [
                'service' => $service
            ]);
        }

        return back()->with('error', 'Не удалось ничего найти');
    }
}
