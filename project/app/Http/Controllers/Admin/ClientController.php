<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientModel;

class ClientController extends Controller
{
    public function create(Request $request) {
        $request->flash();
        $client = new ClientModel();
        $this->validate($request, ClientModel::rules($client));

        try {
            if ($client->fill($request->all())->save()) {
                return back()->with('success', 'Записьо клиенте добавлена');
            } else {
                return back()->with('error', 'Не удалось добавить запись о клиенте. Попробуйте еще раз');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    public function index() {
        try {
            $clients = ClientModel::all();
            return view('admin.client.index', [
                'clients' => $clients,
            ]);
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    public function delete() {

    }
}
