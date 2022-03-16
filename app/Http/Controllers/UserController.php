<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @authenticated
 * @group Пользователь
 *
 * APIs для юзеров
 */
class UserController extends Controller
{
    /**
     * Регистрация пользователя
     */
    public function register(Request $request)
    {
        $validate = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $user = User::query()->create($validate);
        $token = $user->createToken($request['email'])->plainTextToken;

        return response()->json(["user" => $user, "token" => $token]);

    }

    /**
     * Авторизация пользователя
     */
    public function getToken(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $user = User::query()
            ->where('email', $request['email'])
            ->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json(["success" => false,
                "error" => "Неверный логин или пароль"], 404);
        }

        $token = $user->createToken($request['email'])->plainTextToken;

        return response()->json(["token" => $token]);
    }

    /**
     * Получение авторизированного пользователя
     */
    public function me()
    {
        $user = auth()->user()->toArray();

        return response()->json(["user" => $user]);
    }

    /**
     * Удалить токен
     *
     * удаляет авторизацию текущего пользователя
     */
    public function dropToken()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json([]);
    }

    /**
     * Обновить данные
     *
     * Обновить данные авторизированного пользователя
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'login' => 'sometimes',
        ]);

        auth()->user()->update($validate);
        return response()->json([]);
    }


    /**
     * Удалить пользователя
     *
     * @urlParam id user
     */
    public function delete($id)
    {
        $user = User::query()->find($id);
        $user->delete();
        return response()->json([]);
    }
}
