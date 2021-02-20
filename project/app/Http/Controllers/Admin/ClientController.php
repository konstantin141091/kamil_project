<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientImport;
use App\Exports\ClientExport;
class ClientController extends Controller
{
    public function create(Request $request) {
        $request->flash();
        $client = new ClientModel();
        $this->validate($request, ClientModel::rules($client));

        try {
            if ($client->fill($request->all())->save()) {
                return back()->with('success', 'Запись о клиенте добавлена');
            } else {
                return back()->with('error', 'Не удалось добавить запись о клиенте. Попробуйте еще раз');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    public function index() {
        try {
            $clients = ClientModel::paginate(5);
            return view('admin.client.index', [
                'clients' => $clients,
            ]);
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    public function delete(Request $request) {
        try {
            if (DB::table('clients')->delete($request->id)) {
                return redirect()->route('admin.index')->with('success', 'Запись успешно удалена.');
            } else {
                return back()->with('error', 'Не удалось удалить запись. Попробуйте еще раз');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Не удалось удалить запись. Попробуйте еще раз');
        }
    }

    public function edit($id) {
        try {
            $client = ClientModel::query()->find($id);
            return view('admin.client.edit', [
                'client' => $client,
            ]);
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    public function update($id, Request $request, ClientModel $clientModel) {
        $request->flash();
        $this->validate($request, ClientModel::rules($clientModel), [], ClientModel::attributesName());
        try {
            $client = ClientModel::query()->find($id);
            $client->fill($request->all());
            if ($client->save()) {
                return back()->with('success', 'Запись о клиенте успешно обновлена');
            } else {
                return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
            }
        }catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }

    public function find(Request $request) {
        $request->flash();
        if ($request->client_find) {
            try {
                $clients = ClientModel::query()->where('client', '=', $request->client_find)->get();
                if ($clients->isNotEmpty()) {
                    return view('admin.client.show', [
                        'clients' => $clients,
                    ]);
                } else {
                    return back()->with('error', 'По такому имени ничего не нашли');
                }
            } catch (\Exception $exception) {
                return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
            }

        } else {
            return back()->with('error', 'Нужно написать имя клиента');
        }
    }

    public function import(Request $request) {
        if (!$request->hasFile('clients')) {
            return redirect()->back()->with('error', 'Вы не загрузили файл');
        } else {
            try {
                $path = $request->file('clients')->store('storage');
                Excel::import(new ClientImport(), $path);
                return redirect()->back()->with('success', 'Данные успешно загруженны');
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
            }

        }
    }

    public function export() {
        try {
            return Excel::download(new ClientExport(), 'clients.xlsx');
        } catch (\Exception $exception) {
            return back()->with('error', 'Сбой базы данных. Попробуйте еще раз');
        }
    }
}
