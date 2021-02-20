<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create(Request $request) {
        $request->flash();
        $this->validator($request->all())->validate();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        try {
            if ($user->save()) {
                return back()->with('success', 'Пользователен успешно создан');
            } else {
                return back()->with('error', 'Ошибка при создание пользователя. Повторите еще раз.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Ошибка базы данных. Повторите еще раз.');
        }

    }

    public function index() {
        try {
            $users = User::query()->where('is_admin', '=', false)->paginate(10);
            if ($users->isNotEmpty()) {
                return view('admin.user.index', [
                    'users' => $users
                ]);
            } else {
                return back()->with('error', 'Нет ни одного админа сайта');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Ошибка базы данных. Повторите еще раз.');
        }
    }

    public function delete(Request $request) {
        try {
            if (DB::table('users')->delete($request->id)) {
                return redirect()->route('admin.index')->with('success', 'Админ успешно удален.');
            } else {
                return back()->with('error', 'Не удалось удалить админа. Попробуйте еще раз');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Не удалось удалить админа. Попробуйте еще раз');
        }
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
