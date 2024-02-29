<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function  registration_view()
    {
        return view('register');
    }

    public function  auth_view()
    {
        return view('auth');
    }
    public function registration_valid(Request $request)
    {
        $request->validate([
            "username" => "required|unique:users",
            "email" => "required|unique:users|email",
            "password" => "required",
            "password_reset" => "required|same:password",
        ], [
            "username.required" => "Поле обязательно для заполнения",
            "email.required" => "Поле обязательно для заполнения",
            "password.required" => "Поле обязательно для заполнения",
            "password_reset.required" => "Поле обязательно для заполнения",
            "email.unique" => "Данная почта уже занят",
            "email.email" => "Неверный формат электронной почты",
            "password_reset.same" => "Пароли не совпадают",

        ]);
        $userInfo = $request->all();
        $userAdd = User::create([
            'username' => $userInfo['username'],
            'email' => $userInfo['email'],
            'password' => Hash::make($userInfo['password']),
            'is_blocked' => false,
            'role' => 1,
        ]);
        if ($userAdd) {
            return redirect("/auth")->with('reg', 'Регистрация прошла удачно, авторизируйтесь!');
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка! Проверьте логин или пароль!');
        }
    }
    public function auth_valid(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ], [
            "email.required" => "Поле обязательно для заполнения",
            "email.email" => "Неверный формат email",
            "password.required" => "Поле обязательно для заполнения",
        ]);
        $authInfo = $request->all();
        if (Auth::attempt([
            "email" => $authInfo['email'],
            "password" => $authInfo['password'],
        ])) {
            if (Auth::user()->role == 2) {
                return redirect('/admin/index')->with('admin', 'вы зашли в админ панель!');
            } else {
                return redirect('/')->with('user', 'вы зашли в админ панель!');
            }
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка! Проверьте Почту или пароль!');
        }
    }
    public function signout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('signout', 'Вы вышли из аккаунта!');
    }
}
