<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\UserPermission;
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
                return back()->with('success', 'Новый администратор успешно создан');
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

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user) {
        try {
            if ($user->delete()) {
                return back()->with('success', 'Админ успешно удален.');
            } else {
                return back()->with('error', 'Не удалось удалить админа. Попробуйте еще раз');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Не удалось удалить админа. Попробуйте еще раз');
        }
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissionEdit(User $user, Request $request) {
        $permissions = Permission::all();
        $user_permissions = UserPermission::query()->where(['user_id' => $user->id])->get();

        return view('admin.user.permissions', [
            'permissions' => $permissions,
            'user_permissions' => $user_permissions,
            'user' => $user,
            'admin' => $request->user(),
        ]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permissionUpdate(User $user, Request $request) {
        $permissions = [];
        foreach ($request->all() as $key => $item) {
            if (stristr($key, 'permission')) {
                array_push($permissions, $item);
            }
        }
        UserPermission::query()->where('user_id', '=', $user->id)->delete();
        foreach ($permissions as $item) {
            UserPermission::create([
                'user_id' => $user->id,
                'permission_id' => $item,
            ]);
        }
        return back()->with('success', 'Успешно');
    }
}
